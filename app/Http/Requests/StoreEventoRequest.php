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
            'PrecoIngresso' => 'required|decimal|'
        ];
    }
}
