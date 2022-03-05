<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
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
                'name' => 'required|max:255',
                'job' => 'max:255',
                'facebook' => 'required|max:255',
                'opinion' => 'required',
        ];
    }


    public function messages(){
        return [
            'name.required'=>'enter the name',
            'name.max'=>"the name is very long",
            'max.max'=>'the job is very long',
            'facebook.required'=> 'enter the facebook url',
            'facebook.max'=>'the facebook url is very long',
            'opinion.required'=>'enter the opinion',
        ];
}
}
