<?php


namespace App\Helpers\SchemaHelper\types;


use App\Helpers\SchemaHelper\HasSchemaParts;
use App\Helpers\SchemaHelper\Schema;

class Product implements Schema
{
    use HasSchemaParts;

    function build($item): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "Product",
            "name" => $item->title,
            "description" => $item->seo->description ?? $item->abstract,
            "image" => $this->image($item->photo),
            "sku" => $item->code,
            "mpn" => $item->code,
            "brand" => [
                "@type" => "Brand",
                "name" => $item->brand->title ?? config('settings.main_title')
            ],
            "aggregateRating" => $this->aggRating($item),
            "offers" => $this->prices($item, 'prices'),
            "review" => $this->comments($item)

        ];
    }
}
