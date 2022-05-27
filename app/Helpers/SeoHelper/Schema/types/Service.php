<?php

namespace App\Helpers\SchemaHelper\types;

use App\Helpers\SchemaHelper\HasSchemaParts;

class Service implements \App\Helpers\SchemaHelper\Schema
{
    use HasSchemaParts;

    function build($item): array
    {
        return [
            "@context" => "https://schema.org/",
            "@type" => "Service",
            "serviceType" => $item->title,
            "provider" => $this->websiteInfo(),
            "areaServed" => [
                "@type" => "Country",
                "name" => "Iran"
            ],
        ];
    }
}
