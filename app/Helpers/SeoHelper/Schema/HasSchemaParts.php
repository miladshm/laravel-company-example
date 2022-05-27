<?php

namespace App\Helpers\SchemaHelper;

use App\Models\ContactInfo;

trait HasSchemaParts
{
    /**
     * @return array
     */
    protected function websiteInfo(): array
    {
        $contact = ContactInfo::all();
        return [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "description" => config('settings.sub_title'),
            "name" => config('settings.main_title'),
            "legalName" => config('settings.main_title'),
            "url" => url("/"),
            "logo" => [
                "@type" => "ImageObject",
                "@id" => url("/") . "#Logo",
                "caption" => config('settings.main_title'),
                "inLanguage" => "fa-IR",
                "url" => config("settings.logo")
            ],
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => $contact->where("title", "address")->first()->body ?? "",
                "addressLocality" => "Kashan",
                "addressRegion" => "Isfahan",
                "addressCountry" => "Iran"
            ],
            "contactPoint" => [
                [
                    "@type" => "ContactPoint",
                    "contactType" => "customer service",
                    "name" => "تماس با ما",
                    "description" => "تماس با ما",
                    "telephone" => $contact->where('title', 'phone')->first()->body ?? "",
                    "email" => $contact->where('title', 'email')->first()->body ?? "",
                    "availableLanguage" => "Persian"
                ]
            ]
        ];
    }

    /**
     * @param $item
     * @param string $rel
     * @return array
     */
    protected function comments($item, string $rel = 'comments'): array
    {
        $comments = [];
        foreach ($item->{$rel} as $comment)
            $comments[] = [
                "@context" => "https://schema.org",
                "@type" => "Review",
                "reviewBody" => $comment->body,
                "author" => [
                    "@type" => "Person",
                    "name" => $comment->name
                ]
            ];
        return $comments;
    }

    protected function prices($item, $rel): array
    {
        return [
            "@type" => "AggregateOffer",
            "lowPrice" => $item->{$rel}->min('sale_price') ?? "0",
            "highPrice" => $item->{$rel}->max('price'),
            "offerCount" => $item->{$rel}->count(),
            "priceCurrency" => "IRR",
            "availability" => "https://schema.org/InStock",
        ];
    }

    /**
     * @param $item
     * @param string $ratesRel
     * @return array
     */
    protected function aggRating($item, string $ratesRel = 'reviews'): array
    {
        if ($item->{$ratesRel})
            return [
                "@type" => "AggregateRating",
                "ratingValue" => $item->{$ratesRel}->avg('rate') ?? 4.5,
                "ratingCount" => $item->{$ratesRel}->count() ?? 68,
                "bestRating" => 5,
                "worstRating" => 0
            ];
        else
            return [
                "@type" => "AggregateRating",
                "ratingValue" => 4.5,
                "ratingCount" => 68,
                "bestRating" => 5,
                "worstRating" => 0
            ];
    }

    protected function image(string $url): array
    {
        return [
            "@type" => "ImageObject",
            "url" => url($url)
        ];
    }
}
