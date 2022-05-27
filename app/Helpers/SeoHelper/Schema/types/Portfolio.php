<?php

namespace App\Helpers\SchemaHelper\types;

use App\Helpers\SchemaHelper\HasSchemaParts;
use App\Helpers\SchemaHelper\Schema;

class Portfolio implements Schema
{
    use HasSchemaParts;

    public function build($item): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "CreativeWork",
            "name" => $item->title,
            "description" => $item->body,
            "datePublished" => $item->delivered_at,
            "keywords" => $item->technologies->pluck('title')->toArray(),
            "image" => $this->image($item->photo),
            "author" => $this->websiteInfo(),
            "maintainer" => $this->websiteInfo(),
        ];
    }
}
