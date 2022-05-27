<?php

namespace Modules\Shop\Http\Controllers\Api\Admin;

use App\Http\Requests\ListRequest;
use App\Traits\HasIndex;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Modules\Shop\DataTables\ProductDataTable;
use Modules\Shop\Entities\Category;
use Modules\Shop\Entities\Product;
use Modules\Shop\Http\Requests\ProductRequest;
use Modules\Shop\Http\Requests\UpdateAttributeRequest;
use Modules\Shop\Http\Requests\UpdateProductRequest;
use Modules\Shop\Transformers\ProductCollection;
use Modules\Shop\Transformers\ProductResource;
use Spatie\Tags\Tag;

class ProductController extends Controller
{
    use HasIndex;
    /**
     * Display a listing of the resource.
     * @return ProductCollection
     */
    public function index(ListRequest $request)
    {
        $products =  Product::with(['meta', 'options']);
        $items = $this->grid($request,$products);
        return ProductCollection::make($items);
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
            $this->syncTags($product, $request->tags ?? []);
            $product->meta()->create($request->only($product->metaAttributes));
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json($exception->getMessage());
        }
        DB::commit();
        return response()->json(trans('messages.success_store'));

    }

    /**
     * Show the specified resource.
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        return ProductResource::make($product);
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
            if ($request->filled('tags'))
                $this->syncTags($product, $data['tags']);
            if ($request->filled('categories'))
                $product->categories()->sync($data['categories']);
            $product->meta()->update($request->only($product->metaAttributes));
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(trans('messages.error_status'));
        }
        DB::commit();
        return response()->json(trans('messages.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    private function syncTags (Model $item, $tags)
    {
        $item->tags()->detach();
        foreach ($tags as $tag)
            $item->attachTag(Tag::findOrCreate($tag));
    }
}
