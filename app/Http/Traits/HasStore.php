<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

trait HasStore
{
    abstract private function model(): Model;
    abstract private function requestClass(): FormRequest;


    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $data = $this->validate($request,$this->requestClass()->rules(),$this->requestClass()->messages());

        DB::beginTransaction();
        try {
            $item = $this->model()->query()->create($data);

            $this->storeCallback($request,$item);

        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()],400);
        }
        DB::commit();
        return response()->json(trans('messages.success_status'));
    }


    protected function storeCallback(Request $request,Model $item)
    {

    }


}
