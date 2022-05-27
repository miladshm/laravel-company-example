<?php

namespace App\Helpers\SchemaHelper\types;

class FaqPage implements \App\Helpers\SchemaHelper\Schema
{

    function build($item): array
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "name" => "سوالات متداول",
            "mainEntity" => $this->questions($item)
        ];
    }

    private function questions($items): array
    {
        $questions = [];
        foreach ($items as $question)
            $questions[] = [
                "@type" => "Question",
                "name" => $question->title ?? $question->question,
                "acceptedAnswer" => [
                    "@type" => "Answer",
                    "text" => $question->answer ?? $question->body
                ]
            ];
        return $questions;
    }
}
