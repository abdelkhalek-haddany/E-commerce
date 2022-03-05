<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
                "name" => 'required|unique:tags,name,'.$this->tag->id,
                'description' => 'required',
        ];
    }

    public function messages(){
        return [
            'description.required' => 'Enter description',
            'name.required' => 'Enter name',
            'name.unique' => 'Tag already exist',
        ];
}

}