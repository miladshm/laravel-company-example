<?php


namespace App\Helpers\SchemaHelper\types;


use App\Helpers\SchemaHelper\HasSchemaParts;
use App\Helpers\SchemaHelper\Schema;
use Illuminate\Support\Carbon;

class BlogSchema implements Schema
{
    use HasSchemaParts;

    function build($item): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "BlogPosting",
            "headline" => $item->title,
            "abstract" => strip_tags($item->summary),
            "image" => $this->image($item->photo),
            "author" => $this->websiteInfo(),
            "review" => $this->comments($item),
            "dateCreated" => Carbon::make($item->created_at)->toDateTimeString(),
            "dateModified" => Carbon::make($item->updated_at)->toDateTimeString(),
            "datePublished" => $item->published_at
                ? Carbon::make($item->published_at)->toDateTimeString()
                : Carbon::make($item->created_at)->toDateTimeString(),
            "Text" => strip_tags($item->content)

        ];
    }
}
