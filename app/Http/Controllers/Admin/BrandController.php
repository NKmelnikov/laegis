<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Services\Admin\BrandService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController
{

    private BrandService $brandService;

    public function __construct()
    {
        $this->brandService = new BrandService(Brand::class);
    }

    private function getValidatorRules($isUpdateMethod = false) {

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

    public function getAll(): JsonResponse
    {
        return $this->brandService->getAll();
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

    public function updatePosition(Request $request)
    {
        $this->brandService->updatePosition($request);
    }
}
