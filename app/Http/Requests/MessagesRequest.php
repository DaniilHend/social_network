<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'message' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заголовок является обязательным',
            'message.required' => 'Сообщение является обязательным',
            'title.min' => 'Заголовок должен содержать не менее 3 символов',
            'title.max' => 'Заголовок должен содержать не более 50 символов',
            'message.min' => 'Сообщение должно содержать не менее 3 символов'
        ];
    }
}
