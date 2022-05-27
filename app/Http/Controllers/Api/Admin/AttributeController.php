<?php

namespace Modules\Shop\Http\Controllers\Api\Admin;

use App\Http\Requests\ListRequest;
use App\Traits\HasIndex;
use App\Traits\Movable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shop\DataTables\AttributeDataTable;
use Modules\Shop\Entities\Attribute;
use Modules\Shop\Http\Requests\AttributeRequest;
use Modules\Shop\Http\Requests\UpdateAttributeRequest;
use Modules\Shop\Transformers\AttributeCollection;
use Modules\Shop\Transformers\AttributeResource;

class AttributeController extends Controller
{
    use Movable, HasIndex;
    /**
     * Display a listing of the resource.
     * @group Attribute
     * @bodyParam sort.column string Column of sorting. Example: id
     * @bodyParam sort.order string Order of sorting. Example: asc
     * @bodyParam page integer Number of page. Example: 1
     * @bodyParam pageLength integer Length of page. Example: 10
     * @authenticated
     * @return AttributeCollection
     */
    public function index(ListRequest $request)
    {
        $attributes = $this->grid($request,Attribute::with('options'));
        return AttributeCollection::make($attributes);
    }

    /**
     * Store a newly created attribute in storage.
     * @param AttributeRequest $request
     * @return JsonResponse
     */
    public function store(AttributeRequest $request)
    {
        $attribute = Attribute::query()->create($request->except('options'));
        $attribute->options()->createMany($request->options);
        return response()->json(trans('messages.success_store'));
    }

    /**
     * Show the specified attribute.
     * @param Attribute $attribute
     * @return AttributeResource
     */
    public function show(Attribute $attribute)
    {
        return AttributeResource::make($attribute);
    }

    /**
     * Show the form for editing the specified attribute.
     * @param Attribute $attribute
     * @return Renderable
     */
    public function edit(Attribute $attribute)
    {
        $attribute->load('options');
        $is_color = (bool)$attribute->options()->count('code');
        return view('shop::admin.attribute.edit', compact('attribute', 'is_color'));
    }

    /**
     * Update the specified attribute in storage.
     * @param UpdateAttributeRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateAttributeRequest $request, $id)
    {
        $attribute = Attribute::query()->find($id);
        $attribute->update($request->except('options'));
        $attribute->options()->delete();
        $attribute->options()->createMany($request->options);

        return response()->json(trans('messages.success_update'));
    }

    /**
     * Remove the specified attribute from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
    public function move(Request $request, $id)
    {
        $attr = Attribute::query()->find($id);
        validator($request->all(), ['action' =>  ['required', 'in:up,down']]);
        if ($request->action == "up") {
            $this->moveUp($attr);
        } else {
            $this->moveDown($attr);
        }
        return response()->json(trans('messages.success_status'));
    }
}
