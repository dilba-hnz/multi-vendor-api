<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserRoleEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => ['required','string','max:255'],
            'email'     => ['nullable','email','max:255','unique:users,email'],
            'mobile'    => ['required','max:255','unique:users,mobile'],
            'password'  => ['required','string','min:8','confirmed'],
            'role'      => ['required', new Enum(UserRoleEnum::class)],
        ];
    }
}
