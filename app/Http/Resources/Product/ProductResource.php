<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Vendor\VendorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'vendor'        => VendorResource::make($this->vendor),
            'category'      => CategoryResource::make($this->category),
            'title'         => $this->title,
            'slug'          => $this->slug,
            'description'   => $this->description,
            'price'         => $this->price,
            'stock'         => $this->stock,
        ];
    }
}
