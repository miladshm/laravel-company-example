<?php

namespace Modules\Blog\Http\Controllers\Api\Admin;

use App\Http\Requests\ListRequest;
use App\Traits\HasIndex;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\PostType;
use Modules\Blog\Http\Requests\PostRequest;
use Modules\Blog\Transformers\CategoryCollection;
use Modules\Blog\Transformers\PostCollection;
use Modules\Blog\Transformers\PostResource;
use Spatie\Tags\Tag;

class BlogController extends Controller
{
    use HasIndex;

    /**
     * List of Blog posts.
     * @group Blog Admin
     * @bodyParam sort.column string Column of sorting. Example: id
     * @bodyParam sort.order string Order of sorting. Example: asc
     * @bodyParam page integer Number of page. Example: 1
     * @bodyParam type string Type of the post. Example: article
     * @bodyParam pageLength integer Length of page. Example: 10
     * @authenticated
     * @return PostCollection
     */
    public function index(ListRequest $request)
    {
        $request->validate([
            'type' => ['nullable', 'exists:blog_post_types,type']
        ]);
        $posts = Post::query()
            ->when($request->filled('type'), function ($q) use ($request){
                $q->where('type', strtolower($request->type));
            });
        $blogs = $this->grid($request,$posts);
        return PostCollection::make($blogs);
    }


    /**
     * List of post types and categories grouped by types
     * @group Blog Admin
     * @authenticated
     * @return JsonResponse
     */
    public function postTypes()
    {
        $types = PostType::query()->pluck('slug', 'type')->toArray();
        $categories = $this->postCategories();
        return response()->json(compact('types','categories'));
    }

    /**
     * @return CategoryCollection
     */
    private function postCategories()
    {

        $categories = Category::query()
            ->get()->toTree();

        return CategoryCollection::make($categories)->groupBy('type');
    }

    /**
     * Store a post.
     * @group Blog Admin
     * @authenticated
     * @bodyParam title string required Title of post. Example: post 1
     * @bodyParam body string required Body of post. Example: asc
     * @bodyParam category_id.* required integer required id of a category. Example: 1
     * @bodyParam category_id integer[] required ids of categories . Example: [1]
     * @bodyParam tags array names of tags . Example: [tag1, tag2]
     * @bodyParam tags.* name of a tag . Example: tag1
     * @bodyParam type string required Type of post. Example: article
     * @bodyParam author_id integer required id of user that published post. Example: 1
     * @bodyParam published_at timestamp required Publish date of post. Example: 2021-10-29 11:20:18
     * @bodyParam is_active boolean required Specifying activeness of post. Example: true
     * @bodyParam files string[integer][] files of post (video,document, audio or photo). Example: [["path" => "/images/point-postion-map-logo-design_160401-14.jpg", "source" => "upload", "type" => "photo"]]
     * @bodyParam files.* string[]
     * @bodyParam files.*.path string required_with:files Path of file  Example: /images/point-postion-map-logo-design_160401-14.jpg
     * @bodyParam files.*.source string Source of the file of post (upload, youtube, aparat). Example: upload
     * @bodyParam files.*.type string Type of the file (video,document, audio or photo). Example: photo
     * @bodyParam photo string Cover photo of post. Example: /images/point-postion-map-logo-design_160401-14.jpg

     * @param PostRequest $request
     * @return JsonResponse
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['author'] = auth()->id();
        $post = Post::query()->create($data);
        $this->syncTags($post, $data['tags']);
        $post->categories()->attach($data['category_id']);
        if ($request->filled('files'))
            $post->files()->createMany($request->files);

        return response()->json(trans('messages.success_store'));
    }

    /**
     * Show a blog Post.
     * @group Blog Admin
     * @authenticated
     * @param Post $post
     * @return JsonResponse
     */
    public function show(Post $post)
    {
        return response()->json(PostResource::make($post));
    }

    private function syncTags (Model $item, $tags)
    {
        $item->tags()->detach();
        foreach ($tags as $tag)
            $item->attachTag(Tag::findOrCreate($tag));
    }


    /**
     * Update a blog post.
     * @group Blog Admin
     * @authenticated
     * @urlParam id integer required id of post to be updated. Example: 11
     * @bodyParam title string nullable Title of post. Example: post 1
     * @bodyParam body string nullable Body of post. Example: asc
     * @bodyParam category_id.* nullable required id of a category. Example: 1
     * @bodyParam category_id integer[] ids of categories . Example: [1]
     * @bodyParam tags array names of tags . Example: [tag1, tag2]
     * @bodyParam tags.* name of a tag . Example: tag1
     * @bodyParam type string Type of post. Example: article
     * @bodyParam author_id integer nullable id of user that published post. Example: 1
     * @bodyParam published_at timestamp nullable Publish date of post. Example: 2021-10-29 11:20:18
     * @bodyParam is_active boolean nullable Specifying activeness of post. Example: true
     * @bodyParam file string nullable file of post (video,document, audio or photo). Example: /images/point-postion-map-logo-design_160401-14.jpg
     * @bodyParam file_source string nullable Source of the file of post (upload, youtube, aparat). Example: upload
     * @bodyParam photo string nullable Cover photo of post. Example: /images/point-postion-map-logo-design_160401-14.jpg
     * @param PostRequest $request
     * @param Post $post
     * @return JsonResponse
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        $data['author'] = auth()->id();
        $post->update($data);
        $this->syncTags($post, $data['tags']);
        $post->categories()->sync($data['category_id']);
        return response()->json(trans('messages.success_update'));
    }

    /**
     * Remove a blog post.
     * @authenticated
     * @group Blog Admin
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id)
    {
        Post::destroy($id);
        return response()->json(trans('messages.success_delete'));
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function restore(int $id)
    {
        Post::withTrashed()->find($id)->restore();
        return response()->json(trans('messages.success_restore'));
    }

}
