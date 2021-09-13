<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestRequest;
use App\Http\Requests\TimeRequest;
use App\Models\Dish;
use App\Models\DishReservation;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\Table;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function timeForm()
    {
        return view('frontend.reservation.time_form');
    }

    public function postTime(TimeRequest $request)
    {
        Session::put("time", ['start' => $request->time_start, 'end' => $request->time_end]);

        return redirect()->route('tables.get');
    }

    public function getTables()
    {
        $request = Session::get("time");
        $tables = Table::whereNotIn('id', function ($q) use ($request) {
            $q->select('table_id')->from('reservations')->join('orders', 'orders.id', '=', 'reservations.order_id')
                ->where('orders.time_start', '<', $request['end'])->where('orders.time_end', '>', $request['start']);
        })->paginate(config('restaurant.paginate.table'));

        return view('frontend.reservation.list_table', compact('tables'));
    }

    public function detailTable($id)
    {
        $table = Table::findOrFail($id);

        return view('frontend.reservation.detail_table', compact('table'));
    }

    public function addCartTable(request $request)
    {
        $table = Table::find($request->id_table);

        Cart::instance('tables')->add([
            'id' => $table->id,
            'name' => $table->name,
            'qty' => config('restaurant.default.quantity'),
            'price' => config('restaurant.default.price'),
            'weight' => config('restaurant.default.weight'),
            'options' => [
                'img' => $table->img,
                'max' => $table->max,
                'description' => $table->description,
                'code' => $table->code,
            ]
        ]);

        return redirect()->route('cart.get');
    }

    public function getCart()
    {

        $cartTables = Cart::instance('tables')->content();
        $cartDishes = Cart::instance('dishes')->content();
        $total = Cart::instance('dishes')->totalNew() * Cart::instance('tables')->content()->count();

        return view('frontend.reservation.cart', compact('cartTables', 'cartDishes', 'total'));
    }

    public function addCartDish(request $request)
    {
        $dish = Dish::find($request->id_dish);
        if ($request->quantity != '') {
            $qty = $request->quantity;
        } else {
            $qty = 1;
        }
        Cart::instance('dishes')->add([
            'id' => $dish->id,
            'name' => $dish->name,
            'qty' => $qty,
            'price' => $dish->price,
            'weight' => config('restaurant.default.weight'),
            'options' => [
                'img' => $dish->img,
                'type' => $dish->type,
                'code' => $dish->code,
            ]
        ]);

        return redirect()->route('cart.get');
    }

    public function removeCartDish($id)
    {
        Cart::instance('dishes')->remove($id);

        return redirect()->back();
    }

    public function updateCartDish($rowId, $qty)
    {
        Cart::instance('dishes')->update($rowId, $qty);
    }

    public function removeCartTable($id)
    {
        Cart::instance('tables')->remove($id);

        return redirect()->back();
    }

    public function checkoutGet()
    {
        $order = new Order();
        $order->total = Cart::instance('dishes')->totalNew() * Cart::instance('tables')->content()->count();
        $order->time_start = Session::get('time')['start'];
        $order->time_end = Session::get('time')['end'];
        $order->user_id = Auth::user()->id;
        $order->save();
        foreach (Cart::instance('tables')->content() as $table) {
            $reservation = new Reservation();
            $reservation->order_id = $order->id;
            $reservation->table_id = $table->id;
            $reservation->subtotal = Cart::instance('dishes')->totalNew();
            $reservation->save();
            foreach (Cart::instance('dishes')->content() as $dish) {
                $dishR = new DishReservation();
                $dishR->amount = $dish->qty;
                $dishR->dish_id = $dish->id;
                $dishR->reservation_id = $reservation->id;
                $dishR->save();
            }
        }
        Cart::instance('tables')->destroy();
        Cart::instance('dishes')->destroy();
        

        return redirect()->route('complete.get');
    }

    public function complete()
    {
        Session::forget('time');
        
        return view('frontend.reservation.complete');
    }
}
