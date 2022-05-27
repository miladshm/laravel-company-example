<?php

namespace App\Http\Traits;

use Illuminate\Contracts\View\View;
use Yajra\DataTables\Services\DataTable;

trait HasIndex
{
    abstract private function indexView(): View;
    abstract private function extraData(): ?array;

    /**
     * @return View
     */
    public function index(): View
    {
        return $this->indexView()->with($this->extraData());
    }
}
