<?php

namespace App\Helpers\SchemaHelper\types;

use App\Helpers\SchemaHelper\HasSchemaParts;
use App\Helpers\SchemaHelper\Schema;

class ImageGallery implements Schema
{
    use HasSchemaParts;

    function build($item): array
    {
        $list = [
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "name" => "ImageGallery",
            "url" => url()->current(),
            "numberOfItems" => count($item),
            "itemListElement" => [

            ]
        ];
        $i = 0;
        foreach ($item as $image) {
            $list["itemListElement"][] = [
                "@type" => "ListItem",
                "position" => ++$i,
                "item" => $this->image($image->photo),
            ];
        }
        return $list;
    }
}
