<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'add_user_pic' => 'required|unique:users,user_pic',
            'add_name' => 'required|min:8|max:255',
            'add_username' => 'required|unique:users,username',
            'add_email' => 'required|email|unique:users,email',
            'add_phone' => 'required|numeric',
            'add_birthday' => 'required|date',
            'add_password' => 'required|min:8|max:25',
            'add_password_confirmed' => 'required_with:add_password|same:add_password|min:8|max:25',
            'add_active' => 'required|numeric|max:1'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            
        ];
    }
}
