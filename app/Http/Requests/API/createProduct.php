<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class createProduct extends FormRequest
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
            'name' => 'required|min:1|max:191'
            ,'brand_code' => 'required|exists:brand,code'
            ,'description' => 'nullable'
            ,'variations' => 'required|array'
            ,'variations.*.size_code' => 'required|exists:size,code'
            ,'variations.*.color_code' => 'required|exists:color,code'
        ];
    }
}
