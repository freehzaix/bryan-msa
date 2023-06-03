<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MotdepasseoublieRequest extends FormRequest
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
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Le champs email doit être requis.',
            'email.email' => 'Votre adresse mail est incorrect.',
        ];
    }

}
