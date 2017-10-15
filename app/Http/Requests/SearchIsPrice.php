<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchIsPrice extends FormRequest
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
            'min' => 'required',
            'max' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'min.required' => 'Vui lòng nhập giá cần tìm',
            'max.required' => 'Vui lòng nhập giá cần tìm'

        ];
    }
}
