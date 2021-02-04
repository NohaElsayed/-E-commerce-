<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'email'=>'required|email',
            'username'=>'required|string',
            'photo'=>'nullable|mimes:jpeg,bmp,png'


        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email is required',
            'email.email'=>'Enter a valid email',
            'username.required'=>'UserName is required',
            'username.string'=>'UserName must be alphabetic characters',
            'photo.mimes'=>'Photo must be an image type eg.:.jpeg,.bmp,.png'

        ];
    }
}
