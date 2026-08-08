<?php

namespace App\Http\Requests\Product;

use App\Enums\ProductStatusEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateProductRequest extends FormRequest
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
            'category_id'   => ['sometimes','exists:categories,id'],
            'title'         => ['sometimes','string'],
            'description'   => ['sometimes','string'],
            'price'         => ['sometimes','integer'],
            'stock'         => ['sometimes','integer'],
            'status'        => ['sometimes', new Enum(ProductStatusEnum::class)],
        ];
    }
}
