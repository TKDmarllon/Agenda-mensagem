<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:12',
            'last_name'=>'required|string|min:2|max:50',
            'tel' => 'required|min:8',
            'email' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'O nome precisa ter um nome de 2 à 12 caracteres.',
            'name.min'=>'O nome precisa ter no mínimo 2 caracteres.',
            'name.max'=>'O nome precisa ter no máximo 12 caracteres.',
            'last_name.required'=>'O sobrenome é obrigatório.',
            'last_name.min'=>'O sobrenome precisa ter no mínimo 2 caracteres.',
            'last_name.max'=>'O sobrenome precisa ter no máximo 50 caracteres.',
            'tel.required'=>'O número do telefone é obrigatório',
            'tel.min'=>'O telefone precisa ter no mínimo 8 números.',
            'email.required'=>'O e-mail é obrigatório.',
        ];
    }

    protected function failedValidation(Validator $validator) 
    {
        throw new HttpResponseException(response()->json($validator->errors(), Response::HTTP_BAD_REQUEST));
    }

}
