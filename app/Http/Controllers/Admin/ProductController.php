<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\DataTables\ProductDataTable;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateAttributeRequest;
use Spatie\Tags\Tag;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(ProductDataTable $dataTable)
    {
        $title = "لیست محصولات";
        return $dataTable->render('shop::admin.product.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = Category::withDepth()->get()->toTree();
        $title = "محصول جدید";
        $types = ['normal' => 'ساده', 'variable' => 'متغییر'];
        return view('shop::admin.product.create', compact('categories','title','types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::query()->create($request->all());
            $product->categories()->attach($request->categories);
            $this->syncTags($product, $request->input('tags',[]));
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(trans('messages.error_status'));
        }
        $response = trans('messages.success_store');
        $response['url'] = route('admin.product.edit',$product);
        DB::commit();
        return response()->json($response);

    }

    /**
     * Show the specified resource.
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id)
    {
        $product = Product::query()->find($id);
        $categories = Category::withDepth()->get()->toTree();
        $title = 'ویرایش '. $product->title;
        $tags = Tag::all();
        $types = ['normal' => 'ساده', 'variable' => 'متغیر'];
        $attributes = Attribute::query()->pluck('title','id')->toArray();
        return view('shop::admin.product.edit', compact('categories','title', 'tags','types','product','attributes'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Product $product
     * @return JsonResponse
     * @throws \Throwable
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        $data['author'] = auth()->id();

        DB::beginTransaction();
        try {
            $product->update($data);

            $this->syncTags($product, $data['tags']);
            $product->categories()->sync($data['categories']);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(trans('messages.error_status'));
        }
        DB::commit();

        return response()->json(trans('messages.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @return JsonResponse
     * @throws \Throwable
     */
    public function destroy(Product $product)
    {
        $product->deleteOrFail();

        return response()->json(trans('messages.success_delete'));
    }

    private function syncTags (Model $item, $tags)
    {
        if (count($tags)) {
            $item->tags()->detach();
            foreach ($tags as $tag)
                if($tag)
                    $item->attachTag(Tag::findOrCreate($tag));
        }

    }
}
