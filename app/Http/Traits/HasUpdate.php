<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

trait HasUpdate
{
    abstract private function model(): Model;
    abstract private function requestClass(): FormRequest;


    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id): JsonResponse
    {
        $data = $this->validate($request,$this->requestClass()->rules(), $this->requestClass()->messages());
        $item = $this->model()->query()->find($id);

        DB::beginTransaction();
        try {
            $item->update($data);
            $this->updateCallback($request, $item);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()],400);
        }
        DB::commit();
        return response()->json(trans('messages.success_update'));
    }


    protected function updateCallback(Request $request, Model $item)
    {

    }


}
