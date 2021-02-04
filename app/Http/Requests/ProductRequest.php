<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|string|unique:categories,name',
            'price'=>'required|numeric|between:10,10000','oldprice'=>'nullable|numeric|between:10,10000',
            'description'=>'required|string',
            'category'=>'required|unique:categories,name','photo'=>'required'
        ];
    }
    public function messages()
    {
        return [
             'category.required'=>'Category Field is required',
             'name.required'=>'Product Name is required ',
            'name.string'=>'Product Name must be alphabetic characters',
            'name.unique'=>'Product Name already exist',
            'price.numeric'=>'Product Price must be a number',
            'price.between'=>'Price must be between 10 and 10000',
            'price.required'=>'Price field is required',
            'oldprice.numeric'=>'Product Price must be a number',
            'oldprice.between'=>'Price must be between 10 and 10000',
            'description.required'=>'Description field is required',
            'description.string'=>'description must be alphabetic characters',
            'photo.required'=>'Product Photo is required',

        ];
    }
}
