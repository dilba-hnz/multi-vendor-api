<?php

namespace App\Services\Vendor;

use App\Enums\UserRoleEnum;
use App\Exceptions\VendorAlreadyExistsException;
use App\Models\User;
use App\Models\Vendor;
use App\Services\Slug\SlugGeneratorService;
use Illuminate\Support\Facades\DB;

class VendorService
{
    public function __construct(
        protected SlugGeneratorService  $slugGeneratorService
    )
    {
    }

    public function create(User $user, array $attributes): Vendor
    {
        if ($user->vendor()->exists()) {
            throw new VendorAlreadyExistsException();
        }

        $slug = $this->slugGeneratorService->generate(($attributes['store_name']), Vendor::class);

        return DB::transaction(function () use ($user, $attributes, $slug) {
            $user->update(['role' => UserRoleEnum::VENDOR->value]);

            return $user->vendor()->create([
                'store_name'  => $attributes['store_name'],
                'slug'        => $slug,
                'address'     => $attributes['address'] ?? null,
                'description' => $attributes['description'] ?? null,
                'logo'        => $attributes['logo'] ?? null,
                'is_active'   => true,
            ]);

        });
    }
}
