<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subcategory;
use App\Services\Admin\SubcategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubcategoryController
{
    private SubcategoryService $subcategoryService;

    public function __construct()
    {
        $this->subcategoryService = new SubcategoryService(Subcategory::class);
    }

    public function getAll(): JsonResponse
    {
        return $this->subcategoryService->getAll();
    }

    private function getValidatorRules($isUpdateMethod = false): array
    {
        return [
            "active" => "required",
            "category_id" => "required",
            "name" => "required|max:255",
            "slug" => ($isUpdateMethod) ? "required|min:2|max:255" : "required|min:2|max:255|unique:subcategories",
            "description" => "nullable",
        ];
    }

    public function getByCategoryId(Request $request): JsonResponse
    {
        return $this->subcategoryService->getByCategoryId($request);
    }

    public function create(Request $request): JsonResponse
    {
        return $this->subcategoryService->create($request, $this->getValidatorRules());
    }

    public function update(Request $request): JsonResponse
    {
        return $this->subcategoryService->update($request, $this->getValidatorRules(true));
    }

    public function copy(Request $request): JsonResponse
    {
        return $this->subcategoryService->copy($request, $this->getValidatorRules());
    }

    public function delete(Request $request): JsonResponse
    {
        return $this->subcategoryService->delete($request);
    }

    public function updatePosition(Request $request) {
        $this->subcategoryService->updatePosition($request);
    }
}
