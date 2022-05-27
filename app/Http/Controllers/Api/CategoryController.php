<?php

namespace Modules\Blog\Http\Controllers\Api;

use App\Http\Requests\ListRequest;
use App\Traits\HasIndex;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Transformers\CategoryCollection;
use Modules\Blog\Transformers\CategoryResource;
use Modules\Blog\Transformers\PostCollection;

class CategoryController extends Controller
{
    use HasIndex;
    /**
     * List of post categories.
     * @bodyParam sort.column string nullable Column of sorting. Example: id
     * @bodyParam sort.order string Order of sorting. Example: asc
     * @bodyParam page integer Number of page. Example: 1
     * @bodyParam pageLength integer Length of page. Example: 10
     * @group Blog Categories
     * @return CategoryCollection
     */
    public function index(ListRequest $request)
    {
        $categories = $this->grid($request, Category::query()->where('is_active',1));
        return CategoryCollection::make($categories);
    }

    /**
     * Show posts of a category.
     * @urlParam category integer required id of specific category. Example: 2
     * @bodyParam sort.column string nullable Column of sorting. Example: id
     * @bodyParam sort.order string Order of sorting. Example: asc
     * @bodyParam page integer Number of page. Example: 1
     * @bodyParam pageLength integer Length of page. Example: 10
     * @group Blog Categories
     * @param ListRequest $request
     * @param Category $category
     * @return PostCollection
     */
    public function show(ListRequest $request, Category $category)
    {
        if (!$category->is_active)
            abort(404);
        $posts = $this->grid($request, Post::query()->whereHas('categories', function ($q) use ($category) {
            $q->where('id', $category->id);
        }));
        return PostCollection::make($posts);
    }

}
