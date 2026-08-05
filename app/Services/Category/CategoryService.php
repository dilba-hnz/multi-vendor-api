<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\Slug\SlugGeneratorService;

class CategoryService
{
    public function __construct(
        protected SlugGeneratorService  $slugGeneratorService
    )
    {
    }

    public function create(array $attributes): Category
    {
        $slug = $this->slugGeneratorService->generate(($attributes['title']), Category::class);

        return Category::query()->create([
            'title'     => $attributes['title'],
            'slug'      => $slug,
            'is_active' => true,
        ]);

    }

    public function update(Category $category, array $attributes): bool
    {
        $data = $attributes;

        if (isset($attributes['title'])) {
            $data['slug'] = $this->slugGeneratorService->generate(
                $attributes['title'],
                Category::class
            );
        }

        return $category->update($data);
    }

    public function setActive(Category $category, bool $isActive): bool
    {
        return $category->update([
            'is_active' => $isActive
        ]);
    }

}
