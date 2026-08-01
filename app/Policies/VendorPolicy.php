<?php

namespace App\Policies;

use App\Enums\UserRoleEnum;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Auth\Access\Response;

class VendorPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Vendor $vendor): Response
    {
        if ($user->id != $vendor->user->id) {
            return Response::deny("You don't have permission to update vendor");
        }

        return Response::allow();
    }

    public function setActive(User $user, Vendor $vendor): Response
    {
        if ($user->role == UserRoleEnum::ADMIN->value || $user->id == $vendor->user->id) {
            return Response::allow();
        }

        return Response::deny('You don\'t have permission to activate or deactivate vendor');
    }
}
