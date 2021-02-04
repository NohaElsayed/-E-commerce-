<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
              'role'=>'required',
               'name'=>'required|string',
               'email'=>'required|email',
               'password'=>'required|min:5',
               'photo'=>'nullable|mimes:jpeg,bmp,png'
            ];
    }
    public function messages()
    {
        return [
        'role.required'=>'You must select a role',
        'name.required'=>'UserName is required',
        'name.string'=>'UserName must be alphabetic characters',
        'email.required'=>'Email is required',
        'email.email'=>'You must enter a valid email',
        'password.required'=>'Password is required',

        'password.min'=>'Password must be at least 5 characters',
        'photo.mimes'=>'Photo must be .jpeg/bmp/png'
        ];
    }
}
