<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryTableCreateRequest;
use App\Http\Requests\CategoryTableRequest;
use App\Models\Category;
use App\Models\Table;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cateRepo;

    public function __construct(CategoryRepositoryInterface $cateRepo)
    {
        $this->cateRepo = $cateRepo;
    }

    public function index()
    {
        $categories = $this->cateRepo->getCategories();

        return view('manager.category_table.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.category_table.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryTableCreateRequest $request)
    {
        $this->cateRepo->create($request->all());

        return redirect()->route('categories.index')->with('notification', __('messages.no_add_cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->cateRepo->find($id);

        return view(
            'manager.category_table.edit',
            compact('category'),
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryTableRequest $request, $id)
    {
        $this->cateRepo->update($id, $request->all());

        return redirect()->route('categories.index')->with('notification', __('messages.no_update_cate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cateRepo->delete($id);

        return redirect()->route('categories.index')->with('notification', __('messages.no_delete_cate'));
    }
}
