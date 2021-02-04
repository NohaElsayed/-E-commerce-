<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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

               'name'=>'required|string',
               'email'=>'required|email',
               'phone'=>'required|numeric|digits:11',
               'password'=>'required|min:5',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Name is required',
            'name.string'=>'Name must be alphabetic characters',
            'email.required'=>'Email is required',
            'email.email'=>'Enter a valid email',
            'phone.required'=>'Phone is required',
            'phone.numeric'=>'Phone must be a number',
            'phone.digits'=>'Phone must be 11 digits',
             'password.required'=>'Password is required',
             'password.min'=>'Password must be at least 5 characters'
        ];
    }
}
