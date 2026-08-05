<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{
    public function __construct(private CategoryService  $categoryService)
    {
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->categoryService->create($request->validated());

        return CategoryResource::make($category);
    }

    public function index()
    {
        return CategoryResource::collection(Category::query()->where('is_active', true)->paginate());
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $this->categoryService->update($category, $request->validated());

        return response()->noContent();
    }

    public function destroy(Category $category)
    {
        return $category->delete();
    }

    public function restore(Category $category)
    {
        return $category->restore();
    }

    public function activate(Category $category)
    {
        $this->categoryService->setActive($category, true);

        return response()->noContent();
    }

    public function deactivate(Category $category)
    {
        $this->categoryService->setActive($category, false);

        return response()->noContent();
    }
}
