<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['nullable', 'string', 'max:191'],
            'slug' => ['nullable', 'string', 'max:191'],
            'summary' => ['nullable', 'string', 'max:300'],
            'body' =>  ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
            'type' => ['nullable', Rule::in(['normal', 'variable'])],
            'photo' => ['nullable', 'string'],
            'is_available' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
