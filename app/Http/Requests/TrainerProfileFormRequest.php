<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainerProfileFormRequest extends FormRequest
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
            'phone_number' => 'required|min:8|max:32',
            'photo' => 'required|min:1',
            'curriculum' => 'required|min:1',
            'plan_program' => 'required|string|min:32|max:255',
            'work_address' => 'required|string|min:4|max:32',
        ];
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'Il numero di telefono non può essere vuoto',
            'phone_number.min' => 'Il numero di telefono deve avere almeno 8 caratteri',
            'phone_number.max' => 'Il numero di telefono deve avere massimo 32 caratteri',

            'photo.required' => 'Il campo foto non può essere vuoto',
            'photo.string' => 'Il nome della foto caricata non può contenere solo numeri',
            'photo.min' => 'Il nome della foto caricata deve avere almeno 1 caratteri',

            'curriculum.required' => 'Il campo curriculum non può essere vuoto',
            'curriculum.string' => 'Il nome del curriculum caricato non può contenere solo numeri',
            'curriculum.min' => 'Il nome del curriculum caricato deve avere almeno 1 carattere',

            'plan_program.required' => 'Il campo programma non può essere vuoto',
            'plan_program.string' => 'Il programma non può contenere solo numeri',
            'plan_program.min' => 'Il programma deve avere almeno 32 caratteri',
            'plan_program.max' => 'Il programma deve avere massimo 255 caratteri',

            'work_address.required' => "Il campo indirizzo non può essere vuoto",
            'work_address.string' => "L'indirizzo non può contenere solo numeri",
            'work_address.min' => "L'indirizzo deve avere almeno 4 caratteri",
            'work_address.max' => "L'indirizzo deve avere massimo 32 caratteri",
        ];
    }
}
