<?php

namespace App\Http\Resources\Vendor;

use App\Http\Resources\Auth\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user'          => new UserResource($this->user),
            'store_name'    => $this->store_name,
            'description'   => $this->description,
            'logo'          => $this->logo,
            'address'       => $this->address,
            'slug'          => $this->slug,
        ];
    }
}
