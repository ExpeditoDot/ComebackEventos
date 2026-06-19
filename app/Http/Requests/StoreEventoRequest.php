<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
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
            'Local' => 'required|string|max;255' ,
            'Data' => 'required|dateTime| after:now' ,
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
            'descricao.required' => 'Insira uma descrição detalhada para o evento.',
            'Data.required' => 'A data e hora do evento são obrigatórias.',
            'Data.after' => 'O evento deve ser agendado para uma data futura.',
            'Local.required' => 'O local onde ocorrerá o evento deve ser informado.',
            'image.image' => 'O arquivo enviado deve ser uma imagem válida.',
            'image.mimes' => 'A imagem deve estar nos formatos: jpeg, png, jpg ou webp.',
            'image.max' => 'O tamanho máximo permitido para a imagem do banner é de 2MB (2048 KB).',
        ];
    }
}


