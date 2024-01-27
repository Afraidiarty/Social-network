<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'min:5|max:25',
            'password' => 'min:6'
        ];
    }

    public function messages(){
        return [
            'name.min' => 'Минимальное количество символов: 5',
            'name.max' => 'Максимальное количество символов: 25',
            'email' => 'Поля email должен быть формата example@gmail.com',
            'password.min' => 'Пароль должен содержать минимум 6 символов',
        ];
    }
}
