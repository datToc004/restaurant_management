<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableCreateRequest;
use App\Http\Requests\TableEditRequest;
use App\Models\Category;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::paginate(config('restaurant.paginate.table'));

        return view('manager.table.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('manager.table.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableCreateRequest $request)
    {

        $table = new Table();
        $table->code = $request->code;
        $table->name = $request->name;
        $table->max = $request->max;
        $table->description = $request->description;
        $table->category_id = $request->category_id;
        $table->status = $request->status;
        if ($request->hasFile('img')) {
            $file = $request->img;
            $filename = Str::slug($request->name, '-') . '.' . $file->getClientOriginalExtension();
            $request->file('img')->storeAs('public/tables', $filename, 'local');
            $table->img = $filename;
        }
        $table->save();

        return redirect()->route('tables.index')->with('notification', __('messages.no_add_table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::findOrFail($id);
        $categories = Category::all();

        return view(
            'manager.table.edit',
            compact('table', 'categories'),
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableEditRequest $request, $id)
    {
        $table = Table::findOrFail($id);
        $table->code = $request->code;
        $table->name = $request->name;
        $table->max = $request->max;
        $table->description = $request->description;
        $table->category_id = $request->category_id;
        $table->status = $request->status;
        if ($request->hasFile('img')) {
            if ($table->img != config('restaurant.default.img')) {
                unlink(storage_path('app/public/tables/' . $table->img));
            }
            $file = $request->img;
            $filename = Str::slug($request->name, '-') . '.' . $file->getClientOriginalExtension();
            $request->file('img')->storeAs('public/tables', $filename, 'local');
            $table->img = $filename;
        }
        $table->save();

        return redirect()->route('tables.index')->with('notification', __('messages.no_edit_dish'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();

        return redirect()->route('tables.index')->with('notification', __('messages.no_delete_dish'));
    }
}
