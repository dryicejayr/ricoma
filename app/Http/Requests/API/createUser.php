<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class createUser extends FormRequest
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
            'first_name' => 'required'
            ,'last_name' => 'required'
            ,'user_name' => 'required|unique:users,user_name'
            ,'email' => 'required'
            ,'password' => 'required|min:6'
        ];
    }
}
