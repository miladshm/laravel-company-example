<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactInfoRequest extends FormRequest
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
    public function rules()
    {
        return [
            'type' => [Rule::requiredIf($this->method() == "POST"),'string', 'max:191'],
            'group' => [Rule::requiredIf($this->method() == "POST"),'string', 'max:50'],
            'title' => [Rule::requiredIf($this->method() == "POST"),'string', 'max:50'],
            'icon' => [Rule::requiredIf($this->method() == "POST"),'string', 'max:191'],
            'value' => [Rule::requiredIf($this->method() == "POST"),'string', 'max:191']
        ];
    }
}
