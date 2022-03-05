<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|max:10|min:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ];
    }
    // public function messages(){

    //     return [
    //         'first_name.required' => 'Enter your first name',
    //         'first_name.string' => 'your first name must be characters',
    //         'first_name.max' => 'your first name is too long',
    //         'last_name.required' => 'Enter your last name',
    //         'last_name.string' => 'your last name must be characters',
    //         'last_name.max' => 'your last name is too long',
    //         'gender.required' => 'Select your gender',
    //         'date.required' => 'Enter your date',
    //         'date.date' => 'your date is not valide',
    //         'password.required' => 'Enter the password',
    //         'phone.required'=> 'Enter your phone',
    //         'phone.max'=> 'your phone is must be 10 numbers',
    //         'phone.min'=> 'your phone is must be 10 numbers',
    //         'email.required'=> 'Enter your email',
    //         'email.string'=> 'your email not valide',
    //         'email.email'=> 'your email not valide',
    //         'email.unique'=> 'this email all ready exists',
    //         'email.max'=> 'this email too long',
    //     ];
    // }
}