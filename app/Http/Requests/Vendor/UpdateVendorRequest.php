<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'store_name'    => ['nullable', 'string'],
            'address'       => ['nullable', 'string'],
            'logo'          => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'description'   => ['nullable', 'string'],
        ];
    }
}
