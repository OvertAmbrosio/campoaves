<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactoStoreRequest extends FormRequest
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
            'nombre' => 'required|max:64|string',
            'email' => 'required|email|max:64',
            'telefono' => 'required|integer',
            'ubicacion' => 'nullable|max:128|string',
            'asunto' => 'required|max:128|string',
            'mensaje' => 'required|max:1000|string',
        ];
    }
}
