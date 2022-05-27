<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:191'],
            'slug' => ['nullable', 'string', 'max:191'],
            'summary' => ['nullable', 'string', 'max:300'],
            'body' =>  ['required', 'string'],
            'is_active' => ['required', 'boolean'],
            'type' => ['required', Rule::in(['normal', 'variable'])],
            'photo' => ['nullable', 'string'],
            'is_available' => ['required', 'boolean'],
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
