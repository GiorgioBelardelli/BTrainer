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
            'phone_number' => 'required|string|min:9|max:16',
            'photo' => 'required|string|min:2|max:32',
            'curriculum' => 'required|string|min:2|max:32',
            'plan_program' => 'required|string|min:32|max:255',
            'work_address' => 'required|string|min:8|max:32',
        ];
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'Il numero di telefono non può essere vuoto',
            'phone_number.string' => 'Il numero di telefono  deve essere una stringa',
            'phone_number.min' => 'Il numero di telefono  deve avere almeno 9 caratteri',
            'phone_number.max' => 'Il numero di telefono deve avere massimo 16 caratteri',

            'photo.required' => 'La foto non può essere vuota',
            'photo.string' => 'La foto  deve essere una stringa',
            'photo.min' => 'La foto  deve avere almeno 2 caratteri',
            'photo.max' => 'La foto deve avere massimo 32 caratteri',

            'curriculum.required' => 'Il curriculum non può essere vuoto',
            'curriculum.string' => 'Il curriculum deve essere una stringa',
            'curriculum.min' => 'Il curriculum deve avere almeno 2 caratteri',
            'curriculum.max' => 'Il curriculum deve avere massimo 32 caratteri',

            'plan_program.required' => 'Il programma non può essere vuoto',
            'plan_program.string' => 'Il programma deve essere una stringa',
            'plan_program.min' => 'Il programma deve avere almeno 32 caratteri',
            'plan_program.max' => 'Il programma deve avere massimo 255 caratteri',

            'work_address.required' => "L' indirizzo non può essere vuoto",
            'work_address.string' => "L' indirizzo deve essere una stringa",
            'work_address.min' => "L' indirizzo deve avere almeno 8 caratteri",
            'work_address.max' => "L' indirizzo deve avere massimo 32 caratteri",
        ];
    }
}
