<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
                'name' => 'required|max:100',
                'email' => 'required|email|max:255',
                'subject' => 'required',
                'message' => 'required',
        ];
    }

//     public function messages(){
//         return [
//             'name.required' => __('requests/messages.your_name'),
//             'name.max'=> __('requests/messages.name_very_long'),
//             'email.required' =>__('requests/messages.your_email'),
//             'email.email'=> __('requests/messages.not_valid'),
//             'email.max'=> __('requests/messages.email_very_long'),
//             'subject.required'=> __('requests/messages.select_subject'),
//             'content.required'=> __('requests/messages.enter_content'),
//             'message.required'=> __('requests/messages.enter_message'),
//         ];
// }
}