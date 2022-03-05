<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            "thumbnail" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "title" => 'required|unique:posts,title',
            "lang" => "required|max:5",
            "details" => "required",
            "expert" => "required",
            "tag_id" => "required"
        ];
    }

    public function messages(){

        return [
            'thumbnail.required' => 'Enter thumbnail url',
            'title.required' => 'Enter title',
            'title.unique' => 'Title already exist',
            'expert.required' => 'Enter expert',
            'lang.required' => 'Enter language',
            'expert.max' => 'the lang is very long',
            'details.required' => 'Enter details',
            'category_id.required' => 'Select category',
            'tag_id.required' => 'Select tags',
            'thumbnail.image'=>'this file must be an image',
            'thumbnail.mimes'=>'the file extention is not valid',
        ];
    }
}
