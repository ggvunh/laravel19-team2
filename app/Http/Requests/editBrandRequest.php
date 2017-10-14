<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editBrandRequest extends FormRequest
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
            'brand-name'=>'required',
            'brand-image'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'brand-name.required'=>'Brand name is required',
            'brand-image.required'=>'Brand image is required'
        ];
    }
}
