<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishCreateRequest;
use App\Http\Requests\DishEditRequest;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::paginate(config('restaurant.paginate.dish'));

        return view('manager.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.dish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishCreateRequest $request)
    {
        $dish = new Dish();
        $dish->code = $request->code;
        $dish->name = $request->name;
        $dish->type = $request->type;
        $dish->description = $request->description;
        $dish->price = $request->price;
        if ($request->hasFile('img')) {
            $file = $request->img;
            $filename = Str::slug($request->name, '-') . '.' . $file->getClientOriginalExtension();
            $request->file('img')->storeAs('public/dishes', $filename, 'local');
            $dish->img = $filename;
        }
        $dish->save();

        return redirect()->route('dishes.index')->with('notification', __('messages.no_add_dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);

        return view('manager.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DishEditRequest $request, $id)
    {
        $dish = Dish::findOrFail($id);
        $dish->code = $request->code;
        $dish->name = $request->name;
        $dish->type = $request->type;
        $dish->description = $request->description;
        $dish->price = $request->price;
        if ($request->hasFile('img')) {
            if ($dish->img != config('restaurant.default.img')) {
                unlink(storage_path('app/public/dishes/' . $dish->img));
            }
            $file = $request->img;
            $filename = Str::slug($request->name, '-') . '.' . $file->getClientOriginalExtension();
            $request->file('img')->storeAs('public/dishes', $filename, 'local');
            $dish->img = $filename;
        }
        $dish->save();

        return redirect()->route('dishes.index')->with('notification', __('messages.no_update_dish'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::findOrFail($id);
        $dish->delete();

        return redirect()->route('dishes.index')->with('notification', __('messages.no_delete_dish'));
    }
}
