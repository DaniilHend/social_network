<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'login' => 'required|min:3|max:16',
            'password' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'Поле логина является обязательным',
            'password.required' => 'Поле пароля является обязательным',
            'login.min' => 'Логин должен содержать не менее 3 символов',
            'login.max' => 'Логин должен содержать не более 16 символов',
            'password.min' => 'Пароль должен содержать не менее 3 символов'
        ];
    }
}
