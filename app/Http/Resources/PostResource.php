<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $this->load('categories')->loadCount('likes');
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'categories' => CategoryCollection::make($this->whenLoaded('categories')),
            'type' => __($this->type),
            'summary' => $this->summary,
            'created_at' => verta($this->created_at)->formatDate(),
            'photo' => asset($this->photo),
            'file' => asset($this->file),
            'file_source' => $this->file_source,
            'author' => $this->author->name,
            'likeCount' => $this->likes_count
        ];
    }
}
