<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 */
class RegisterRequest extends FormRequest
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
            'USUA_NM' => 'required|string|max:255',
            'USUA_CD_CPF' =>'required|string',
            'USUA_TX_EMAIL' =>'required|unique:usuarios,USUA_TX_EMAIL|string|email:rfc,dns|max:255',
            'USUA_TX_SENHA' => 'required|string|min:8|max:255',
        ];
    }
}
