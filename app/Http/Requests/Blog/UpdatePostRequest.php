<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
            "thumbnail" => 'image|mimes:jpg,jpeg,png',
            "title" => 'required',
            Rule::unique('posts')->ignore($this->id),
            "details" => "required",
            "expert" => "required",
            "tag_id" => "required"
        ];
    }

    public function messages(){

        return [
            'thumbnail.required' => 'Enter thumbnail url',
            'title.required' => 'Enter title',
            'expert.required' => 'Enter expert',
            'title.unique' => 'Title already exist',
            'details.required' => 'Enter details',
            'category_id.required' => 'Select category',
            'tag_id.required' => 'Select tags',
        ];
    }
}
