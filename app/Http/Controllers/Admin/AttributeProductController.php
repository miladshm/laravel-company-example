<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Http\Requests\AttributeProductRequest;

class AttributeProductController extends Controller
{

    public function store(AttributeProductRequest $request)
    {

    }

    /**
     * @param Attribute $attribute
     * @return array
     */
    public function getOptions(Attribute $attribute): array
    {
        $results = $attribute->options
            ->map(function ($item){
                return [
                    'id' => $item['id'],
                    'text' => $item['title']
                ];
            })->toArray();

        return compact('results');
    }

}
