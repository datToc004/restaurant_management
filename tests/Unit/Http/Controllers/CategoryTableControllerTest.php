<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\Manager\CategoryTableController;
use App\Http\Requests\CategoryTableCreateRequest;
use App\Http\Requests\CategoryTableRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Mockery;
use Tests\TestCase;

class CategoryTableControllerTest extends TestCase
{
    protected $cateRepoMock;
    protected $cateController;
    public function setUp(): void
    {
        parent::setUp();
        $this->cateRepoMock = Mockery::mock(CategoryRepository::class);
        $this->cateController = new CategoryTableController(
            $this->cateRepoMock
        );
    }

    public function tearDown(): void
    {
        Mockery::close();
        $this->cateController = null;
        parent::tearDown();
    }

    public function testIndex()
    {
        $cates = Category::factory()->count(3)->make();
        $this->cateRepoMock
            ->shouldReceive('getCategories')
            ->withNoArgs()
            ->andReturn($cates);

        $view = $this->cateController->index();
        $data = $view->getData();
        $this->assertEquals('manager.category_table.index', $view->getName());
        $this->assertIsArray($data);
        $this->assertArrayHasKey('categories', $data);
    }

    public function testCreate()
    {
        $view = $this->cateController->create();
        $this->assertEquals('manager.category_table.create', $view->getName());
    }

    public function testStore()
    {
        $cate = Category::factory()->make();
        $request = new CategoryTableCreateRequest([
            'name' => $cate->name,
        ]);
        $data = $request->all();
        $this->cateRepoMock
            ->shouldReceive('create')
            ->once()
            ->with($data);
        $response = $this->cateController->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('categories.index'), $response->getTargetUrl());
        $this->assertEquals(Session::get('notification'), __('messages.no_add_cate'));
    }

    public function testEdit()
    {
        $cate = Category::factory()->make(['id' => 1]);
        $this->cateRepoMock
            ->shouldReceive('find')
            ->with($cate->id)
            ->andReturn($cate);

        $view = $this->cateController->edit($cate->id);
        $data = $view->getData();
        $this->assertEquals('manager.category_table.edit', $view->getName());
        $this->assertIsArray($data);
        $this->assertArrayHasKey('category', $data);
    }

    public function testUpdate()
    {
        $cate = Category::factory()->make(['id' => 1]);
        $request = new CategoryTableRequest([
            'name' => $cate->name,
        ]);
        $data = $request->all();
        $this->cateRepoMock
            ->shouldReceive('update')
            ->once()
            ->with($cate->id, $data);
        $response = $this->cateController->update($request, $cate->id);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('categories.index'), $response->getTargetUrl());
        $this->assertEquals(Session::get('notification'), __('messages.no_update_cate'));
    }

    public function testDestroy()
    {
        $cate = Category::factory()->make(['id' => 1]);
        $this->cateRepoMock
            ->shouldReceive('delete')
            ->once()
            ->with($cate->id);
        $response = $this->cateController->destroy($cate->id);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('categories.index'), $response->getTargetUrl());
        $this->assertEquals(Session::get('notification'), __('messages.no_delete_cate'));
    }
}
