<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addProductRequest extends FormRequest
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
            'product-name'=>'required|unique:products,name',
            'description' =>'required',
            'quantity'    =>'required',
            'unit'        =>'required',
            'unitprice'   =>'required',
            'product-image'=>'required|unique:products,image'   
        ];
    }
    public function messages()
    {
        return [
            'product-name.required' => 'Product name is required',
            'product-name.unique'   => 'Product name is exist',
            'description.required'  => 'Product description is required',
            'quantity.required'     => 'Quantity of product is required',
            'unit.required'         => 'Unit of product is required',
            'unitprice.required'    => 'Unit-price is required',
            'product-image.required'=> 'Product image is required',
            'product-image.unique'  => 'Product image is exist'
        ];

    }
}
