<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'phone' =>'required|max:100|unique:vendors,phone,'.$this -> id,
            'email'  => 'required|email|unique:vendors,email,'.$this -> id,
            'city'   => 'required',
            'country'   => 'required',
            'province'   => 'required'
        ];
    }
}
