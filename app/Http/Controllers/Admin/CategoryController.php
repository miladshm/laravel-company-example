<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Movable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\DataTables\CategoryDataTable;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    use Movable;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(CategoryDataTable $dataTable)
    {
        $title = 'دسته بندی های فروشگاه';
        return $dataTable->render('admin.category.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = 'دسته بندی جدید';
        $categories = Category::query()->get()->toTree();
        return view('admin.category.create', compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        Category::query()->create($request->all());
        return response()->json(trans('messages.success_store'));
    }

    /**
     * Show the specified resource.
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $category = Category::query()->find($id);
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = Category::query()->find($id);
        $title = $category->title;
        $categories = Category::query()->get()->toTree();
        return view('admin.category.edit', compact('category','categories','title'));
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::query()->find($id);
        $category->update($request->all());
        return response()->json(trans('messages.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $category = Category::query()->find($id);
        $category->delete();
        return response()->json(trans('messages.success_delete'));
    }

    public function move(Request $request, $id)
    {
        $category = Category::query()->find($id);
        validator($request->all(), ['action' =>  ['required', 'in:up,down']]);
        if ($request->action == "up") {
            $this->moveUp($category);
        } else {
            $this->moveDown($category);
        }
        return response()->json(trans('messages.success_status'));
    }
}
