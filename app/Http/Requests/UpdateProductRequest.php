<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'detail' => 'required:max:500',
            'price' => 'required:min:1',
            'thumbnail' => 'image|mimes:jpg,jpeg,png,gif,svg|max:1024'
            // |dimensions:min_height=800
        ];
    }
}