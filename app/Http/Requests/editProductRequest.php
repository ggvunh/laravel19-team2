<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editProductRequest extends FormRequest
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
            'product-name'=>'required',
            'description' =>'required',
            'quantity'    =>'required',
            'unit'        =>'required',
            'unitprice'   =>'required'  
        ];
    }

    public function messages()
    {
        return [
            'product-name.required' => 'Product name is required',
            'description.required'  => 'Product description is required',
            'quantity.required'     => 'Quantity of product is required',
            'unit.required'         => 'Unit of product is required',
            'unitprice.required'    => 'Unit-price is required'
        ];
    }
}
