<?php

namespace Modules\Shop\Http\Controllers\Api;

use App\Http\Requests\ListRequest;
use App\Traits\HasIndex;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\Product;
use Modules\Shop\Http\Requests\ProductRequest;
use Modules\Shop\Http\Requests\UpdateAttributeRequest;
use Modules\Shop\Http\Requests\UpdateProductRequest;
use Modules\Shop\Transformers\ProductCollection;
use Modules\Shop\Transformers\ProductResource;

class ProductController extends Controller
{
    use HasIndex;
    /**
     * Display list of products.
     * @group Product
     * @return ProductCollection
     */
    public function index(ListRequest $request)
    {
        $products = $this->grid($request, Product::query());

        return ProductCollection::make($products);
    }


    /**
     * New product.
     * @group Product
     * @param ProductRequest $request
     * @return JsonResponse
     */
    public function store(ProductRequest $request)
    {
        try {
            $product = Product::query()->create($request->all());
        } catch (\Exception $e) {
            $error = trans('messages.error_status');
            $error['message'] = $e->getMessage();
            return response()->json($error, 500);
        }
        return response()->json(ProductResource::make($product), 201);
    }

    /**
     * Show a product.
     * @group Product
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return response()->json(ProductResource::make($product));
    }

    /**
     * Update a product
     * @group Product
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        try {
            $product->fill($request->all());
            $product->save();
        } catch (\Exception $e) {
            $error = trans('messages.error_status');
            $error['message'] = $e->getMessage();
            return response()->json($error, 500);
        }
        return response()->json($product);
    }

    /**
     * Remove a product.
     * @group Product
     * @authenticated
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            $product->delete();
        } catch (\Exception $exception) {
            $error = trans('messages.error_status');
            $error['message'] = $exception->getMessage();
            return response()->json($error, 500);
        }
        return response()->json($product);

    }
}
