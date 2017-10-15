<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editUserRequest extends FormRequest
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
            'user-name'=>'required',
            'email' =>'required',
            'address'    =>'required',
            'phone_number'        =>'required',
        ];
    }
    public function messages()
    {
        return [
            'user-name.required' => 'User-name name is required',
            'email.required'  => 'Email is required',
            'address.required' => 'Address is required',
            'phone_number.required'    => 'phone_number is required'
        ];
    }
}
