<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email' . $this->route('client'), // el email no sea único si el cliente ya existe,
            'password' => 'sometimes|required|string|min:6',
            'avatar_url' => 'sometimes|string|max:255',
            'logo_url' => 'sometimes|string|max:255',
            'profile_photo_path' => 'sometimes|string|max:255',
        ];
    }
}
