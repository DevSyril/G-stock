<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:128',
            'email' => 'required|min:3|max:128|email',
            'password' => 'required|min:6|max:64',
            'passwordConfirm' => 'same:password',
        ];
    }

    public function messages():array {
        return [
            'name.required' => 'Le nom est requis.',
            'name.min' => 'Le nom doit contenir au minimum 3 caractères.',
            'name.max' => 'Le nom doit contenir au maximum 128 caractères.',
            'name.unique' => 'Le nom est déjà utilisé',
            'email.email' => 'L\'adresse email est invalide',
            'email.required' => 'L\'adresse e-mail est requise',
            'email.min' => 'L\'e-mail doit contenir au minimum 3 caractères.',
            'email.max' => 'L\'e-mail doit contenir au maximum 128 caractères.',
            'email.unique' => 'L\'e-mail est déjà utilisé.',
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au minimum 6 caractères.',
            'password.max' => 'Le mot de passe doit contenir au maximum 64 caractères.',
            'passwordConfirm.same' => 'Les deux mots de passe ne sont pas identiques.',
        ];
    }
}
