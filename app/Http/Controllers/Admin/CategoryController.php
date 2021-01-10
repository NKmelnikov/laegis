<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController
{

    private CategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService(Category::class);
    }

    private function getValidatorRules($isUpdateMethod = false): array
    {

        return [
            "active" => "required",
            "type" => "required",
            "slug" => ($isUpdateMethod) ? "required|min:2" : 'required|min:2|unique:categories',
            "name" => "required|max:255",
            "description" => "nullable",
        ];
    }

    public function getAll(): JsonResponse
    {
        return $this->categoryService->getAll();
    }

    public function getById(Request $request): JsonResponse
    {
        return $this->categoryService->getById($request);
    }

    public function create(Request $request): JsonResponse
    {
        return $this->categoryService->create($request, $this->getValidatorRules());
    }

    public function update(Request $request): JsonResponse
    {
        return $this->categoryService->update($request, $this->getValidatorRules(true));
    }

    public function copy(Request $request): JsonResponse
    {
        return $this->categoryService->copy($request, $this->getValidatorRules());
    }

    public function delete(Request $request): JsonResponse
    {
        return $this->categoryService->delete($request);
    }

    public function updatePosition(Request $request) {
        $this->categoryService->updatePosition($request);
    }
}
