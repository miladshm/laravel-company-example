<?php

namespace App\Http\Traits;

use Illuminate\Contracts\View\View;
use Yajra\DataTables\Services\DataTable;

trait HasDatatable
{
    use HasIndex;

    abstract private function datatable(): DataTable;

    public function index()
    {
        return $this->datatable()->render($this->indexView()->getName(),$this->extraData());
    }
}
