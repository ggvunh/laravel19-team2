<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addMenu extends FormRequest
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
            'menu' => 'required|unique:menus,name'
        ];
    }

    public function messages()
    {
        return [
            'menu.required'=>'Menu Name is required',
            'menu.unique'=>'This name already exists'
        ];
    }
}
