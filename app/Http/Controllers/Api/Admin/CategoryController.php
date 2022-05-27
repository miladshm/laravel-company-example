<?php

namespace Modules\Shop\Http\Controllers\Api\Admin;

use App\Http\Requests\ListRequest;
use App\Traits\HasIndex;
use App\Traits\Movable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\Category;
use Modules\Shop\Http\Requests\CategoryRequest;
use Modules\Shop\Transformers\CategoryCollection;

class CategoryController extends Controller
{
    use Movable, HasIndex;
    /**
     * List of Shop categories.
     * @group Shop Categories Admin
     * @return CategoryCollection
     */
    public function index()
    {
        $categories = Category::query()->get()->toTree();
        return CategoryCollection::make($categories);
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
