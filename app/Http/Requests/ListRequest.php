<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'sort' => ['nullable', 'array'],
            'sort.column' => ['nullable', 'required_with:sort', 'string'],
            'sort.order' => ['nullable', 'required_with:sort', Rule::in(['asc','desc'])],
            'page' => ['nullable', 'integer'],
            'pageLength' => ['nullable', 'integer'],
        ];
    }
}
