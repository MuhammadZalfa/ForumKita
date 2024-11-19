<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Perbaiki typo "illuminate" jadi "Illuminate"
use Illuminate\Validation\Rules\Password; // Sama ini

class UpdateRequest extends FormRequest
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
            'username' => [
                'required', 'alpha_dash',
                Rule::unique('users')->ignore($this->user()->id), // Pakai $this->user()->id buat validasi ignore
                'min:3', 'max:50'
            ],
            'password' => [
                'nullable', 'confirmed', 
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
            'password_confirmation' => ['nullable'], // Ini fix typo, pakai koma bukan titik
            'picture' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
