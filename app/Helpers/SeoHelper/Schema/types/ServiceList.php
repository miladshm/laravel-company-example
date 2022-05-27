<?php

namespace App\Helpers\SchemaHelper\types;

class ServiceList implements \App\Helpers\SchemaHelper\Schema
{

    function build($item): array
    {
        $list = [
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "name" => "ServiceList",
            "url" => url()->current(),
            "numberOfItems" => count($item),
            "itemListElement" => [

            ]
        ];
        $i = 0;
        foreach ($item as $service) {
            $list["itemListElement"][] = [
                "@type" => "ListItem",
                "position" => ++$i,
                "item" => (new Service)->build($service),
            ];
        }
        return $list;
    }
}
