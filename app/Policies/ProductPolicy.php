<?php

namespace App\Policies;

use App\Enums\UserRoleEnum;
use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $allowedRoles = [UserRoleEnum::VENDOR, UserRoleEnum::ADMIN];
        return in_array($user->role, $allowedRoles);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        return $this->isOwnerOrAdmin($user, $product);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        return $this->isOwnerOrAdmin($user, $product);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        return $this->isOwnerOrAdmin($user, $product);
    }

    private function isOwnerOrAdmin(User $user, Product $product): bool
    {
        return $user->role === UserRoleEnum::ADMIN
            || $user->vendor?->id === $product->vendor_id;
    }
}
