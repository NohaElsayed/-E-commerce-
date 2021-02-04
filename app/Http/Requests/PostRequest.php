<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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

            'category'=>'required',
            'header'=>'required|string|unique:posts,title',
            'post_body'=>'required|string',
            'photo'=>'required',




        ];
    }
    public function messages()
    {
        return [
            'category.required'=>'Category is required',
            'header.required'=>'Post Title is required',
            'header.string'=>'Title must be alphabetic characters',
            'header.unique'=>'Title must be unique',
            'post_body.required'=>'Post description is required',
            'post_body.string'=>'Post description must be alphabetic characters',
            'photo.required'=>'required',


0



        ];
    }
}
