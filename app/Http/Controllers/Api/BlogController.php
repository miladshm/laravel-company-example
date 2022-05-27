<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ListRequest;
use App\Traits\HasIndex;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Post;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;

class BlogController extends Controller
{
    use HasIndex;
    /**
     * List of posts
     * @bodyParam sort.column string nullable Column of sorting. Example: id
     * @bodyParam sort.order string Order of sorting. Example: asc
     * @bodyParam page integer Number of page. Example: 1
     * @bodyParam pageLength integer Length of page. Example: 10
     * @group Blog
     * @return PostCollection
     */
    public function index(ListRequest $request)
    {
        $blogs = $this->grid($request, Post::query()->where('is_active' , true));
        return PostCollection::make($blogs);
    }


    /**
     * Show a post.
     * @group Blog
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        if (!$post->is_active)
            abort(404);
        return PostResource::make($post);
    }


    /**
     * Like the specified post.
     * Requesting this route for second time leads to unliking the post
     * @param Post $post
     * @group Blog
     * @urlParam post integer required Id of post to be liked. Example: 11
     * @authenticated
     * @return \Illuminate\Http\JsonResponse
     */
    public function like(Post $post)
    {
        if ($post->likes->contains(auth()->user())) {
            $post->likes()->detach(auth()->id());
            return response()->json(trans('messages.success_status'));
        } else {
            $post->likes()->attach(auth()->id());
            return response()->json(trans('messages.success_status'));
        }
    }
}
