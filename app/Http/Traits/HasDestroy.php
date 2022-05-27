<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\JsonResponse;

trait HasDestroy
{
    abstract private function model():Model;


    /**
     * @param $id
     * @return JsonResponse
     * @throws \Throwable
     */
    public function destroy($id): JsonResponse
    {
            $item = $this->model()->query()
                ->when(in_array(SoftDeletes::class,class_uses($this->model()) ?? []), function (Builder $q){
                    $q->withTrashed();
                })
                ->findOrFail($id);

            if ($item->deleted_at)
                $item->forceDelete();
            else
                $item->deleteOrFail();

        return response()->json(trans('messages.success_delete'));
    }
}
