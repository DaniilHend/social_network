<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksCreateRequest extends FormRequest
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
            'text' => 'required|min:15',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заголовок является обязательным',
            'text.required' => 'Текст является обязательным',
            'title.min' => 'Заголовок должен содержать не менее 3 символов',
            'title.max' => 'Заголовок должен содержать не более 50 символов',
            'text.min' => 'Текст должен содержать не менее 15 символов'
        ];
    }
}
