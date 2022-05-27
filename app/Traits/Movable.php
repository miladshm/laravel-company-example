<?php

namespace App\Traits;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait Movable
{
    abstract private function model(): Model;

    protected function moveUp(Model $model)
    {
        $model->moveOrderUp();
    }

    protected function moveDown(Model $model)
    {
        $model->moveOrderDown();
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function move(Request $request, $id)
    {
        $attr = $this->model()->query()->find($id);
        validator($request->all(), ['action' =>  ['required', 'in:up,down']]);
        if ($request->input('action') == "up") {
            $this->moveUp($attr);
        } else {
            $this->moveDown($attr);
        }
        return response()->json(trans('messages.success_status'));
    }
}
