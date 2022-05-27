<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasShow
{
    abstract private function model(): Model;
    abstract private function relations(): array;


    public function show($id)
    {
        $item = $this->getModel($id);

        return response()->json($item);
    }

    private function getModel($id)
    {
        return $this->model()->query()
            ->when(count($this->relations()), function ($q){
                $q->with($this->relations());
            })->findOrFail($id);
    }
}
