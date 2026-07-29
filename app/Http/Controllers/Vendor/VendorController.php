<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\StoreVendorRequest;
use App\Http\Resources\Vendor\VendorResource;
use App\Services\Vendor\VendorService;

class VendorController extends Controller
{
    public function __construct(
        protected VendorService $vendorService
    )
    {
    }

    public function store(StoreVendorRequest $request)
    {
        $vendor = $this->vendorService->create($request->user(), $request->validated());

        return VendorResource::make($vendor);
    }
}
