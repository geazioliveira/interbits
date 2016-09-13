<?php

namespace Geazi\Interbits\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|max:50',
            'function_id' => 'required',
            'email' => 'required|unique:users|max:100',
            'ddd' => 'required',
            'phone' => 'required',
            'password' => 'required|between:8,15|alpha_dash',
            'rePassword' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor digite seu nome',
            'name.max' => 'O nome pode conter no máximo 50 caractéres',
            'function_id.required' => 'Selecione a função do usuário',
            'email.required' => 'Digite seu email',
            'email.unique' => 'O email digitado já está cadastrado',
            'email.max' => 'O email pode conter no máximo 100 caractéres',
            'ddd.required' => 'Digite o DDD do usuário',
            'phone.required' => 'Digite o telefone do usuário',
            'password.required' => 'Por favor digite a senha do usuário',
            'password.between' => 'A senha deve conter no minimo 8 caractéres ou no máximo 15',
            'password.alpha_dash' => 'A senha deve conter obrigátoriamente números e letras',
            'rePassword.required' => 'Por favor digite a senha do usuário',
            'rePassword.same' => 'As senhas digitadas não são iguais',
        ];
    }
}
