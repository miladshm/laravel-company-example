<?php

namespace App\Helpers\SchemaHelper\types;

class PortfolioList implements \App\Helpers\SchemaHelper\Schema
{

    function build($item): array
    {
        $list = [
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "name" => "PortfoliosList",
            "url" => url()->current(),
            "numberOfItems" => count($item),
            "itemListElement" => [

            ]
        ];
        $i = 0;
        foreach ($item as $portfolio) {
            $list["itemListElement"][] = [
                "@type" => "ListItem",
                "position" => ++$i,
                "item" => (new Portfolio)->build($portfolio),

            ];
        }
        return $list;
    }
}
