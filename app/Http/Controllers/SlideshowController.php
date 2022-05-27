<?php

namespace App\Http\Controllers;

use App\DataTables\SlideshowDataTable;
use App\Http\Requests\StoreSlideshowRequest;
use App\Http\Requests\UpdateSlideshowRequest;
use App\Http\Traits\HasCreate;
use App\Http\Traits\HasDatatable;
use App\Http\Traits\HasDestroy;
use App\Http\Traits\HasEdit;
use App\Http\Traits\HasShow;
use App\Http\Traits\HasStore;
use App\Http\Traits\HasUpdate;
use App\Models\Slideshow;
use App\Traits\Movable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Yajra\DataTables\Services\DataTable;

class SlideshowController extends Controller
{
    use HasCreate, HasDatatable, HasStore, HasShow, HasEdit, HasUpdate, HasDestroy, Movable;

    private function datatable(): DataTable
    {
        return new SlideshowDataTable();
    }

    private function editView(): View
    {
        return \view('admin.slideshow.edit');
    }

    private function extraData(): ?array
    {
        return [
            'title' => 'اسلایدشو',
            'url' => 'slideshow',
            'sizes' => Slideshow::getSizes()
        ];
    }

    private function indexView(): View
    {
        return \view('admin.slideshow.index');
    }

    private function model(): Model
    {
        return new Slideshow();
    }

    private function relations(): array
    {
        return [];
    }

    private function requestClass(): FormRequest
    {
        return new StoreSlideshowRequest();
    }

    private function createView(): View
    {
        return \view('admin.slideshow.create');
    }
}
