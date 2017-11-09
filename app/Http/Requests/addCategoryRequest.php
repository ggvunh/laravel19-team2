<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCategoryRequest extends FormRequest
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
            'cateproduct-name'=>'required',
            'menu' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'cateproduct-name.required'=>'Category Name is required',
            'menu.required'=>'Menu is required',
        ];
    }
}
