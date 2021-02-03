<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Services\Admin\SubcategoryService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    private SubcategoryService $subcategoryService;

    public function __construct()
    {
        $this->subcategoryService = new SubcategoryService(Subcategory::class);
        $this->middleware('auth');

    }

    private function getValidatorRules($isUpdateMethod = false): array
    {
        return [
            "active" => "required",
            "category_id" => "required",
            "name" => "required|max:255",
            "name_en" => "required|max:255",
            "slug" => ($isUpdateMethod) ? "required|min:2|max:255" : "required|min:2|max:255|unique:subcategories",
            "description" => "nullable",
        ];
    }

    public function getCopyView(Request $request): Renderable {
        $entity = $this->subcategoryService->getById($request);
        $entity->action = 'copy';
        return view('admin.subcategory.edit')->with(['entity' => $entity]);
    }

    public function getEditView(Request $request): Renderable {
        $entity = $this->subcategoryService->getById($request);
        $entity->action = 'edit';
        return view('admin.subcategory.edit')->with(['entity' => $entity]);
    }

    public function getAll(): JsonResponse
    {
        return $this->subcategoryService->getAll();
    }

    public function getAllPaginated(): JsonResponse
    {
        return $this->subcategoryService->getAllPaginated();
    }

    public function getById(Request $request): JsonResponse
    {
        return $this->subcategoryService->getById($request);
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

    public function updatePositionManually(Request $request): JsonResponse
    {
        return $this->subcategoryService->updatePositionManually($request);
    }

    public function bulkActivate(Request $request): JsonResponse
    {
        return $this->subcategoryService->bulkActivate($request);
    }

    public function bulkDeactivate(Request $request): JsonResponse
    {
        return $this->subcategoryService->bulkDeactivate($request);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        return $this->subcategoryService->bulkDelete($request);
    }
}
