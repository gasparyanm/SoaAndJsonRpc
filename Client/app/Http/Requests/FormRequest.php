<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;
use Illuminate\Validation\Rule;

class FormRequest extends Request
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
            'page_uid' => 'required|int',
            'title' => [
                Rule::requiredIf(function () {
                    return isset($this->all()['content']) && $this->all()['page_uid'];
                }),
                'nullable',
                'min:5',
                'max:155'
            ],
            'content' => Rule::requiredIf(function () {
                return isset($this->all()['title']) && $this->all()['page_uid'];
            }),
            'nullable',
            'min:5',
            'max:155',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'page_uid.required' => 'A page uid is required',
            'title.required' => 'A title is required',
            'content.required' => 'A content is required',
        ];
    }
}
