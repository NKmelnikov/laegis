<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Contracts\Support\Renderable;
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
            "slug" => ($isUpdateMethod) ? "required|min:2" : 'required|min:2|unique:categories',
            "name" => "required|max:255",
            "name_en" => "required|max:255",
            "description" => "nullable",
        ];
    }

    public function getCopyView(Request $request): Renderable {
        $entity = $this->categoryService->getById($request);
        $entity->action = 'copy';
        return view('admin.category.edit')->with(['entity' => $entity]);
    }

    public function getEditView(Request $request): Renderable {
        $entity = $this->categoryService->getById($request);
        $entity->action = 'edit';
        return view('admin.category.edit')->with(['entity' => $entity]);
    }

    public function getAll(): JsonResponse
    {
        return $this->categoryService->getAll();
    }

    public function getAllPaginated(): JsonResponse
    {
        return $this->categoryService->getAllPaginated();
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

    public function updatePositionManually(Request $request): JsonResponse
    {
        return $this->categoryService->updatePositionManually($request);
    }

    public function bulkActivate(Request $request): JsonResponse
    {
        return $this->categoryService->bulkActivate($request);
    }

    public function bulkDeactivate(Request $request): JsonResponse
    {
        return $this->categoryService->bulkDeactivate($request);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        return $this->categoryService->bulkDelete($request);
    }
}
