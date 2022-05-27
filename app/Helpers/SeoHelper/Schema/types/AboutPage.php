<?php


namespace App\Helpers\SchemaHelper\types;


use App\Helpers\SchemaHelper\Schema;

class AboutPage implements Schema
{

    function build($item): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "AboutPage",
            "name" => config('settings.main_title'),
            "description" => strip_tags($item->body),
            "url" => url()->current()
        ];
    }
}
