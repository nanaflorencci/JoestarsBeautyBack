<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'nome' => 'required|max:50|min:5',
            'celular' => 'required|max:11|min:11',
            'email' => 'required|unique:clientes,email|max:50',
            'cpf' => 'required|unique:clientes,cpf|max:11|min:11',
            'dataNascimento' => 'required|date',
            'cidade' => 'required|max:50|min:4',
            'estado' => 'required|max:30|min:4',
            'pais' => 'required|max:30|min:4',
            'rua' => 'required|max:50|min:4',
            'numero' => 'required|max:4|min:4',
            'bairro' => 'required|max:30|min:4',
            'cep' => 'required|max:8|min:8',
            'complemento' => 'required|max:30|min:4',
            'password' => 'required|'

        ];
    }
    public function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            //nome
            'nome.required' => 'O campo do nome é obrigatório',
            'nome.max' => 'O campo do nome deve conter, no máximo, 120 caracteres',
            'nome.min' => 'O campo do nome deve conter, no mínimo, 5 caracteres',

            //celular
            'celular.required' => 'O campo do celular é obrigatório',
            'celular.min' => 'O campo do celular deve conter, no mínimo, 11 caracteres',
            'celular.max' => 'O campo do celular deve conter, no máximo 11, caracteres',
            'celular.unique' => 'Celular já cadastrado. Por obséquio, informe outro',

            //email
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'Email já cadastrado. Por obséquio, informe outro email',
            'email.max' => 'O email deve conter 120 caracteres',

            //cpf
            'cpf.required' => 'O campo cpf é obrigatorio',
            'cpf.max' => 'O campo cpf deve ter no maximo 11 caracteres',
            'cpf.min' => 'O campo cpf deve ter no mainimo 11 caracteres',
            'cpf.unique' => 'Cpf já cadastrado, informe outro cpf',

            //data de nascimento        
            'dataNascimento.required' => 'O campo data de nascimento é obrigatorio',
            'dataNascimento.date' => 'O campo data de nascimento de estar no formato de data ex:12/04/2000',

            //cidade        
            'cidade.required' => 'O campo cidade é obrigatorio',
            'cidade.max' => 'O campo cidade deve conter no maximo 120 caracteres',

            //estado
            'estado.required' => 'O campo estado é obrigatorio',
            'estado.min' => 'O campo estado deve coonter no minimo 2 caracteres',
            'estado.max' => 'O campo estado deve conter no maximo 2 caracteres',

            //país
            'pais.required' => 'O campo país é obrigatorio',
            'pais.required' => 'O campo país deve conter no minímo 80 caracteres',
            'pais.max' => 'O campo país deve conter no maximo 5 caracteres',

            //rua        
            'rua.required' => 'O campo rua é obrigatorio',
            'rua.required' => 'O campo rua deve conter no minimo 5 caracteres',
            'rua.required' => 'O campo rua deve conter no maximo 120 caracteres',

            //número
            'numero.required' => 'O campo numero é obrigatorio',
            'numero.max' => 'O campo numero deve conter no maximo 10 carcteres',

            //bairro
            'bairro.required' => 'O campo bairro é obrigatorio',
            'bairro.required' => 'O campo bairro deve conter no maximo 100 caracteres',

            //cep
            'cep.required' => 'O CEP  é obrigatorio',
            'cep.max' => 'O CEP deve conter no maximo 8 caracteres',
            'cep.min' => 'O CEP deve conter no minimo 8 caracteres',

            //complemento
            'complemento.required' => 'O campo complemento é obrigatorio',
            'complemento.max' => 'O campo complemento deve conter no maximo 150',

            //senha       
            'password.required' => 'O campo senha é obrigatorio'
        ];
    }
}
