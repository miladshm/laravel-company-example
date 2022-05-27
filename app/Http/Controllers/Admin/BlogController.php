<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Requests\PostRequest;
use App\Http\Traits\HasDatatable;
use App\Http\Traits\HasDestroy;
use App\Http\Traits\HasEdit;
use App\Http\Traits\HasShow;
use App\Http\Traits\HasStore;
use App\Http\Traits\HasUpdate;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostType;
use App\Traits\HasIndex;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Tags\Tag;
use Yajra\DataTables\Services\DataTable;

class BlogController extends Controller
{
    use HasDatatable, HasStore, HasUpdate, HasEdit, HasShow, HasDestroy;

    protected function storeCallback(Request $request, Model $item)
    {
        $item->author_id = auth()->user()->id;
        $item->save();

        $this->syncTags($item, $request->input('tags', []));
        $item->categories()->sync($request->input('category_id', []));
    }

    private function syncTags(Model $item, $tags)
    {
        $item->tags()->detach();
        foreach ($tags as $tag) $item->attachTag(Tag::findOrCreate($tag));
    }

    private function datatable(): DataTable
    {
        return new BlogDataTable();
    }

    private function editView(): View
    {
        return \view('admin.post.edit');
    }

    private function extraData(): ?array
    {
        return ['title' => 'مقالات', 'url' => 'post', 'categories' => Category::query()->pluck('title', 'id')->toArray(), 'tags' => Tag::all(), 'types' => PostType::query()->pluck('slug', 'type')->toArray(), 'file_sources' => ['aparat' => 'آپارات', 'youtube' => 'یوتوب', 'upload' => 'آپلود']];
    }

    private function indexView(): View
    {
        return \view('admin.post.index');
    }

    private function model(): Model
    {
        return new Post();
    }

    private function relations(): array
    {
        return [];
    }

    private function requestClass(): FormRequest
    {
        return new PostRequest();
    }
}
