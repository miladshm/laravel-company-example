<?php


namespace App\Helpers\SchemaHelper\types;


use App\Helpers\SchemaHelper\Schema;

class ContactPage implements Schema
{

    function build($item): array
    {
        return
            [
                "@context" => "https://schema.org",
                "@type" => "Organization",
                "name" => "تماس با ما",
                "url" => url()->current(),
                "contactPoint" => [
                    [
                        "@type" => "ContactPoint",
                        "contactType" => "customer service",
                        "name" => "تماس با ما",
                        "description" => "تماس با ما",
                        "telephone" => $item->where('title', 'phone')->first()->body ?? "",
                        "email" => $item->where('title', 'email')->first()->body ?? "",
                        "availableLanguage" => "Persian"
                    ]
                ]
            ];
    }
}
