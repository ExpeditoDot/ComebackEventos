<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Nome' => 'required|string|min:5|max:150' ,
            'Local' => 'required|string|min:5|max:255' ,
            'Data' => 'required|date| after:now' ,
            'PrecoIngresso' => 'required|numeric|min:0|max:9999.99' ,
            'descricao' =>'required|string|min:0|max:65000' ,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'Nome.required' => 'O nome do evento é de preenchimento obrigatório.',
            'Nome.min' => 'O nome do evento deve conter no mínimo 5 caracteres.',
            'Nome.max' => 'O nome pode conter no máximo 150 caracteres.' ,
            'Local.required' => 'O local onde ocorrerá o evento deve ser informado.',
            'Local.min' => 'O local do evento deve conter no mínimo 5 caracteres.',
            'Local.max' => 'O local pode conter no máximo 150 caracteres.' ,
            'Data.required' => 'A data e hora do evento são obrigatórias.',
            'Data.after' => 'O evento deve ser agendado para uma data futura.',
            'PrecoIngresso.required' => 'O preço é obrigatório',
            'PrecoIngresso.max' => "caristia é essa man" , 
            'descricao.required' => 'Insira uma descrição detalhada para o evento.',
            'descricao.max' => 'Você chegou ao limite de caracteres da descrição.',
            'image.image' => 'O arquivo enviado deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve estar nos formatos: jpeg, png, jpg ou webp.',
            'image.max' => 'O tamanho máximo permitido para a imagem do banner é de 2MB (2048 KB).',
        ];
    }
}


