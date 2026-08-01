<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vendor\StoreVendorRequest;
use App\Http\Requests\Vendor\UpdateVendorRequest;
use App\Http\Resources\Vendor\VendorResource;
use App\Models\Vendor;
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

    public function show(Vendor $vendor)
    {
        return VendorResource::make($vendor);
    }
    public function index()
    {
        return VendorResource::collection(Vendor::query()->latest()->paginate());
    }

    public function update(Vendor $vendor, UpdateVendorRequest $request)
    {
        $this->authorize('update', $vendor);

        $this->vendorService->update($vendor, $request->validated());

        return response()->noContent();
    }

    public function active(Vendor $vendor)
    {
        $this->authorize('setActive', $vendor);

        $this->vendorService->setActive($vendor, true);

        return response()->noContent();
    }

    public function deactivate(Vendor $vendor)
    {
        $this->authorize('setActive', $vendor);

        $this->vendorService->setActive($vendor, false);

        return response()->noContent();
    }
}
