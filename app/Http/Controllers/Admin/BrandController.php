<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\Admin\BrandService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    private BrandService $brandService;

    public function __construct()
    {
        $this->brandService = new BrandService(Brand::class);
        $this->middleware('auth');
    }

    private function getValidatorRules($isUpdateMethod = false): array {

        return [
            "active" => "required",
            "slug" => ($isUpdateMethod) ? "required|min:2" : 'required|min:2|unique:brands',
            "name" => "required|min:2|max:50",
            "name_en" => "required|min:2|max:50",
            "description" => "nullable",
            "description_en" => "nullable",
            "imgPath" => "required|string|min:2|max:255",
        ];
    }

    public function getCopyView(Request $request): Renderable {
        $entity = $this->brandService->getBySlug($request);
        $entity->action = 'copy';
        return view('admin.brand.edit')->with(['entity' => $entity]);
    }

    public function getEditView(Request $request): Renderable {
        $entity = $this->brandService->getBySlug($request);
        $entity->action = 'edit';
        return view('admin.brand.edit')->with(['entity' => $entity]);
    }

    public function getAll(): JsonResponse
    {
        return $this->brandService->getAll();
    }

    public function getAllPaginated(): JsonResponse
    {
        return $this->brandService->getAllPaginated();
    }

    public function getBySlug(Request $request): JsonResponse
    {
        return $this->brandService->getBySlug($request);
    }

    public function create(Request $request): JsonResponse
    {
        return $this->brandService->create($request, $this->getValidatorRules());
    }

    public function update(Request $request): JsonResponse
    {
        return $this->brandService->update($request, $this->getValidatorRules(true));
    }

    public function copy(Request $request): JsonResponse
    {
        return $this->brandService->copy($request, $this->getValidatorRules());
    }

    public function delete(Request $request): JsonResponse
    {
        return $this->brandService->delete($request);
    }

    public function updatePosition(Request $request): JsonResponse
    {
        $this->brandService->updatePosition($request);
    }

    public function updatePositionManually(Request $request): JsonResponse
    {
        return $this->brandService->updatePositionManually($request);
    }

    public function bulkActivate(Request $request): JsonResponse
    {
        return $this->brandService->bulkActivate($request);
    }

    public function bulkDeactivate(Request $request): JsonResponse
    {
        return $this->brandService->bulkDeactivate($request);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        return $this->brandService->bulkDelete($request);
    }
}
