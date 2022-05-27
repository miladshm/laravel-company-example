<?php


namespace App\Helpers\SchemaHelper\types;


use App\Helpers\SchemaHelper\Schema;

class BreadCrumb implements Schema
{

    /**
     * Giving an array of titles and urls, then builds a breadcrumb schema
     * @param array $item
     * @return array
     */
    function build($item): array
    {
        $breadCrumb = [
            "@context" => "https://schema.org/",
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "صفحه نخست",
                    "item" => url("/")
                ]
            ]
        ];
        $i = 1;
        foreach ($item as $bread) {
            array_push($breadCrumb["itemListElement"], [
                "@type" => "ListItem",
                "position" => ++$i,
                "name" => $bread['title'] ?? $bread['name'],
                "item" => $bread['url']
            ]);
        }
        return $breadCrumb;
    }
}
