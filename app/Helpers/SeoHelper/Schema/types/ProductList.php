<?php


namespace App\Helpers\SchemaHelper\types;


use App\Helpers\SchemaHelper\Schema;

class ProductList implements Schema
{

    function build($item): array
    {
        $list = [
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "name" => "ProductsList",
            "url" => url()->current(),
            "numberOfItems" => count($item),
            "itemListElement" => [

            ]
        ];
        $i = 0;
        foreach ($item as $product) {
            $list["itemListElement"][] = [
                "@type" => "ListItem",
                "position" => ++$i,
                "item" => (new Product)->build($product),

            ];
        }
        return $list;
    }
}
