<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreguntasFormRequest extends FormRequest
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
            'temas_id'=> 'required|max:11',
            'pregunta'=> 'required',
            'respuesta_1'=> 'required',
            'respuesta_2'=> 'required',
            'respuesta_3'=> 'required',
            'respuesta_4'=> 'required',
            'correcta'=> 'required|max:1',
            'tipo'=> 'required|max:11'
        ];
    }
}
