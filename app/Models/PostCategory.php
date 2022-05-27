<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\PostCategory
 *
 * @property int $post_id
 * @property int $category_id
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Post|null $post
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostCategory wherePostId($value)
 * @mixin \Eloquent
 */
class PostCategory extends Pivot
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'post_category';

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
