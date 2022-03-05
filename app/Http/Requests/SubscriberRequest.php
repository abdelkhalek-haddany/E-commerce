<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
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
            'email' => 'required|unique:subscribers|email|max:100',
        ];
    }

//     public function messages(){
//         return [
//             'email.required'=> __('requests/subscribers.your_email'),
//             'email.unique'=> __('requests/subscribers.exists'),
//             'email.email'=> __('requests/subscribers.not_valid'),
//             'email.max'=> __('requests/subscribers.very_long'),
//         ];
// }
}
