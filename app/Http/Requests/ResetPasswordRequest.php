<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'motdepasse' => 'required|min:8',
            'motdepasse2' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'motdepasse.required' => 'Ce champs mot de passe est requis.',
            'motdepasse.min' => 'Le mot de passe doit excéder 8 caractères.',
            'motdepasse2.required' => 'Vous devez retaper le même mot de passe.',
        ];
    }

}
