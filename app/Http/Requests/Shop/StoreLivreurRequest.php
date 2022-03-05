<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivreurRequest extends FormRequest
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
            // 'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'phone' =>'required|max:100|unique:vendors,phone,'.$this -> id,
            'email'  => 'required|email|unique:vendors,email,'.$this -> id,
            // 'category_id'  => 'required|exists:categories,id',
            // 'address'   => 'required|max:500',
            'password'   => 'required'
        ];
    }


    // public function messages(){

    //     return [
    //         'required'  => 'هذا الحقل مطلوب ',
    //         'max'  => 'هذا الحقل طويل',
    //         'category_id.exists'  => 'القسم غير موجود ',
    //         'email.email' => 'ضيغه البريد الالكتروني غير صحيحه',
    //         'address.string' => 'العنوان لابد ان يكون حروف او حروف وارقام ',
    //         'name.string'  =>'الاسم لابد ان يكون حروف او حروف وارقام ',
    //         'logo.required_without'  => 'الصوره مطلوبة',
    //         'email.unique' => 'البريد الالكتروني مستخدم من قبل ',
    //         'mobile.unique' => 'رقم الهاتف مستخدم من قبل ',


    //     ];
    // }

}
