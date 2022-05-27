<?php


namespace App\Helpers\SchemaHelper\types;


class BlogList implements \App\Helpers\SchemaHelper\Schema
{

    function build($item): array
    {
        $list = [
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "name" => "ArticlesList",
            "url" => url()->current(),
            "numberOfItems" => count($item),
            "itemListElement" => [

            ]
        ];
        $i = 0;
        foreach ($item as $blog) {
            $list["itemListElement"][] = [
                "@type" => "ListItem",
                "position" => ++$i,
                "item" => (new BlogSchema)->build($blog),
            ];
        }
        return $list;
    }
}
