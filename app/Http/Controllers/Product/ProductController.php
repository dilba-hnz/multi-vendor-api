<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    public function __construct(
        private ProductService  $productService
    )
    {
    }

    public function store(StoreProductRequest $request)
    {
        $product = $this->productService->create($request->user()->vendor, $request->validated());

        return ProductResource::make($product);
    }

    public function index()
    {
        return ProductResource::collection(Product::query()->with(['vendor', 'category'])->paginate());
    }

    public function show(Product $product)
    {
        return ProductResource::make($product);
    }

    public function update(Product $product,UpdateProductRequest $request)
    {
        $this->productService->update($product, $request->validated());

        return response()->noContent();
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }

    public function restore(Product $product)
    {
        $product->restore();

        return response()->noContent();
    }
}
