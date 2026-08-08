<?php

namespace App\Services\Product;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use App\Models\Vendor;
use App\Services\Slug\SlugGeneratorService;

class ProductService
{
    public function __construct(
        protected SlugGeneratorService  $slugGeneratorService
    )
    {
    }

    public function create(Vendor $vendor,array $attributes): Product
    {
        $slug = $this->slugGeneratorService->generate(($attributes['title']), Product::class);

        return $vendor->product()->create([
            'category_id'   => $attributes['category_id'],
            'title'         => $attributes['title'],
            'slug'          => $slug,
            'description'   => $attributes['description'] ?? null,
            'price'         => $attributes['price'],
            'stock'         => $attributes['stock'],
            'status'        => ProductStatusEnum::ACTIVE
        ]);
    }

    public function update(Product $product, array $attributes): bool
    {
        $data = $attributes;

        if (isset($attributes['title'])) {
            $data['slug'] = $this->slugGeneratorService->generate(
                ($attributes['title']),
                Product::class
            );
        }

        return $product->update($data);
    }
}
