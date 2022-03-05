<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required|max:255',
            'price' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'quantity' => 'required',
            'summary' => 'required'
        ];
    }
}