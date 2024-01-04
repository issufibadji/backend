<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 */
class UsuarioStoreRequest extends FormRequest
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
            'dadosPessoaisAt.nome'=>'required|string|min:3|max:50',
            'dadosPessoaisAt.cpf'=>'required|unique:usuarios,USUA_CD_CPF|string|min:11|max:11|regex:/^[0-9]+$/',
            'dadosPessoaisAt.rg'=>'required',
            'dadosPessoaisAt.pais'=>'required|string|',
            'dadosPessoaisAt.profissao'=>'required|string|min:3',
            'dadosPessoaisAt.estadocivil'=>'required',
            'dadosPessoaisAt.email'=>'required|unique:usuarios,USUA_TX_EMAIL|string|regex:/(.+)@(.+)\.(.+)/i',
            'dadosPessoaisAt.telefone.*.telefone' => 'required|integer|min:11',
            'tipoProcesso'=>'required',
            'orgao'=> 'required',
            'atividadeExercida'=> 'required|string',
            'sintomas'=> 'required|string',
            'especialidadeMedica'=> 'required|string',
            'relatoPeticao'=> 'required|string',
            'valorIndenizacao'=> 'required|integer|min:1',
            'descrevaValor'=> 'required|string',
            'cienteAcoes'=> 'required|string',
            'renuncioValor'=> 'required|string',
            'receberEmail'=> 'required|integer',
        ];
    }
}
