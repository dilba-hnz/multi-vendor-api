<?php

namespace App\Services\Slug;

use Illuminate\Support\Str;

class SlugGeneratorService
{
    /**
     * @param class-string<\Illuminate\Database\Eloquent\Model> $model
     */
    public function generate(string $name, string $model): string
    {
        $baseSlug = Str::slug($name);
        $counter = 2;
        $slug = $baseSlug;

        while (
            $model::query()->where('slug', $slug)->exists()
        ) {
            $slug = "{$slug}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
