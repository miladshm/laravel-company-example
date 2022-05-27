<?php


namespace App\Helpers\SchemaHelper\types;


use App\Helpers\SchemaHelper\HasSchemaParts;
use App\Helpers\SchemaHelper\Schema;

class MainPage implements Schema
{
    use HasSchemaParts;

    function build($item): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "WebSite",
            "@id" => url("/") . "#WebSite",
            "name" => config('settings.main_title'),
            "description" => config('settings.sub_title'),
            "url" => url()->current(),
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => url("search?q=") . "{search_term_string}",
                "query-input" => "required name=search_term_string"
            ],
            "publisher" => [
                $this->websiteInfo()
            ]
        ];
    }
}
