<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleRequest extends FormRequest
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
            'name'=>'required|string|unique:title,name'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Category name is required',
            'name.string'=>'Category name must be alphabetic characters',
            'name.unique'=>' Category name already exits'
        ];
    }
}
