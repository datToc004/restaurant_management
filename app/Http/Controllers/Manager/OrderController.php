<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeRequest;
use App\Models\Dish;
use App\Models\DishReservation;
use App\Models\Order;
use App\Models\Receipt;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(config('restaurant.paginate.order'))
            ->where('status', config('restaurant.status_order.not_accept'));

        return view('manager.order.index', compact('orders'));
    }

    public function acceptOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = config('restaurant.status_order.accept');
        $order->save();

        return redirect()->route('orders.index')->with('notification', __('messages.no_accept_order'));
    }

    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->back()->with('notification', __('messages.no_delete_order'));
    }

    public function getAcceptOrders()
    {
        $orders = Order::paginate(config('restaurant.paginate.order'))
            ->where('status', config('restaurant.status_order.accept'));

        return view('manager.order.list_table_accept', compact('orders'));
    }

    public function getBill($id)
    {
        $order = Order::findOrFail($id);

        return view('manager.order.bill', compact('order'));
    }

    public function postBill(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = config('restaurant.status_order.processed');
        $order->save();
        $receipt = new Receipt();
        $receipt->type_payment = $request->type_payment;
        $receipt->order_id = $id;
        $receipt->save();

        return redirect()->route('orders.accept.get')->with('notification', __('messages.no_bill_order'));
    }

    public function getTime()
    {
        return view('manager.order.add.time_form');
    }

    public function postTime(TimeRequest $request)
    {
        Session::put("time", ['start' => $request->time_start, 'end' => $request->time_end]);

        return redirect()->route('order.add');
    }

    public function addOrder()
    {
        $request = Session::get("time");
        $tables = Table::whereNotIn('id', function ($q) use ($request) {
            $q->select('table_id')->from('reservations')->join('orders', 'orders.id', '=', 'reservations.order_id')
                ->where('orders.time_start', '<', $request['end'])->where('orders.time_end', '>', $request['start']);
        })->paginate(config('restaurant.paginate.table'));
        $dishes = Dish::all();
        $users = User::all();

        return view('manager.order.add.create', compact('tables', 'dishes', 'users'));
    }

    public function getSubTotal($dishes)
    {
        $subTotal = 0;
        foreach ($dishes as $dish) {
            $dish_o = Dish::findOrFail($dish['id']);
            $subTotal += $dish['qty'] * $dish_o->price;
        }

        return $subTotal;
    }

    public function getTotal($numTable, $dishes)
    {
        $total = $numTable * $this->getSubTotal($dishes);

        return $total;
    }

    public function postAddOrder(Request $request)
    {
        $order = new Order();
        $order->total = $this->getTotal(count($request->tables), $request->dishes);
        $order->time_start = Session::get('time')['start'];
        $order->time_end = Session::get('time')['end'];
        $order->user_id = $request->user_id;
        $order->note = $request->note;
        $order->save();
        foreach ($request->tables as $table) {
            $reservation = new Reservation();
            $reservation->order_id = $order->id;
            $reservation->table_id = $table['id'];
            $reservation->subtotal = $this->getSubTotal($request->dishes);
            $reservation->save();
            foreach ($request->dishes as $dish) {
                $dishR = new DishReservation();
                $dishR->amount = $dish['qty'];
                $dishR->dish_id = $dish['id'];
                $dishR->reservation_id = $reservation->id;
                $dishR->save();
            }
        }
        Session::forget('time');

        return redirect()->route('orders.index')->with('notification', __('messages.no_add_order'));
    }

    public function getEditTime($id)
    {
        $order = Order::findOrFail($id);

        return view('manager.order.edit.time_form', compact('order'));
    }

    public function postEditTime(TimeRequest $request)
    {
        Session::put("time", ['start' => $request->time_start, 'end' => $request->time_end]);

        return redirect()->route('order.edit', $request->id);
    }

    public function editOrder($id)
    {
        $request = Session::get("time");
        $request['id'] = $id;
        $order = Order::findOrFail($id);
        $tables = Table::whereNotIn('id', function ($q) use ($request) {
            $q->select('table_id')->from('reservations')->join('orders', 'orders.id', '=', 'reservations.order_id')
                ->where('orders.time_start', '<', $request['end'])->where('orders.time_end', '>', $request['start'])
                ->where('orders.id', '<>', $request['id']);
        })->paginate(config('restaurant.paginate.table'));
        $dishes = Dish::all();
        $users = User::all();

        return view('manager.order.edit.edit', compact('tables', 'dishes', 'users', 'order'));
    }

    public function postEditOrder(Request $request, $id)
    {

        $order = Order::findOrFail($id);
        $order->total = $this->getTotal(count($request->tables), $request->dishes);
        $order->time_start = Session::get('time')['start'];
        $order->time_end = Session::get('time')['end'];
        $order->user_id = $request->user_id;
        $order->note = $request->note;
        $order->save();
        Reservation::where('order_id', $order->id)->delete();
        foreach ($request->tables as $table) {
            $reservation = new Reservation();
            $reservation->order_id = $order->id;
            $reservation->table_id = $table['id'];
            $reservation->subtotal = $this->getSubTotal($request->dishes);
            $reservation->save();
            DishReservation::where('reservation_id', $reservation->id)->delete();
            foreach ($request->dishes as $dish) {
                $dishR = new DishReservation();
                $dishR->amount = $dish['qty'];
                $dishR->dish_id = $dish['id'];
                $dishR->reservation_id = $reservation->id;
                $dishR->save();
            }
        }
        Session::forget('time');

        return redirect()->route('orders.index')->with('notification', __('messages.no_edit_order'));
    }
}
