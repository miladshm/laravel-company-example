<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Movable;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\DataTables\AttributeDataTable;
use App\Models\Attribute;
use App\Http\Requests\AttributeRequest;
use App\Http\Requests\UpdateAttributeRequest;

class AttributeController extends Controller
{
    use Movable;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(AttributeDataTable $dataTable)
    {
        $title = 'لیست ویژگی ها';
        return $dataTable->render('shop::admin.attribute.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = 'ایجاد ویژگی';
        return view('shop::admin.attribute.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
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
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('shop::admin.attribute.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Attribute $attribute
     * @return Renderable
     */
    public function edit(Attribute $attribute)
    {
        $title = $attribute->title;
        $attribute->load('options');
        $is_color = (bool)$attribute->options()->count('code');
        return view('shop::admin.attribute.edit', compact('attribute', 'title', 'is_color'));
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
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
