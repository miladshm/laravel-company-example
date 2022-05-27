<?php

namespace App\Http\Traits;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;

trait HasEdit
{
    abstract private function editView(): View;
    abstract private function model(): Model;
    abstract private function extraData(): ?array;

    /**
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $item = $this->model()->query()->findOrFail($id);
        return $this->editView()->with(compact('item') + $this->extraData());
    }
}
