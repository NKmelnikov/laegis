<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Services\Admin\ProductService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService(Product::class);
    }

    private function getValidatorRules($isUpdateMethod = false): array
    {

        return [
            "brand_id" => "nullable",
            "category_id" => "required",
            "subcategory_id" => "nullable",
            "active" => "required",
            "name" => "required|min:2|max:255",
            "name_en" => "required|min:2|max:255",
            "slug" => ($isUpdateMethod) ? "required|min:2|max:255" : "required|min:2|max:255|unique:products",
            "description" => "nullable",
            "description_en" => "nullable",
            "spec" => "nullable",
            "spec_en" => "nullable",
            "imgPath" => "required",
            "pdf1Path" => "nullable",
            "pdf2Path" => "nullable",
        ];
    }

    public function getCopyView(Request $request): Renderable {
        $entity = $this->productService->getBySlug($request);
        $entity->action = 'copy';
        return view('admin.product.edit')->with(['entity' => $entity]);
    }

    public function getEditView(Request $request): Renderable {
        $entity = $this->productService->getBySlug($request);
        $entity->action = 'edit';

        return view('admin.product.edit')->with(['entity' => $entity]);
    }

    public function getAll(): JsonResponse
    {
        return $this->productService->getAll();
    }

    public function getAllPaginated(): JsonResponse
    {
        return $this->productService->getAllPaginated();
    }

    public function getAllBrand(): JsonResponse
    {
        return $this->productService->getAllBrand();
    }

    public function getBySlug(Request $request): JsonResponse
    {
        return $this->productService->getBySlug($request);
    }

    public function getByCategorySlug(Request $request): JsonResponse
    {
        return $this->productService->getByCategorySlug($request);
    }

    public function getBySubcategorySlug(Request $request): JsonResponse
    {
        return $this->productService->getBySubcategorySlug($request);
    }

    public function getByBrandSlug(Request $request): JsonResponse
    {
        return $this->productService->getByBrandSlug($request);
    }

    public function create(Request $request): JsonResponse
    {
        return $this->productService->create($request, $this->getValidatorRules());
    }

    public function update(Request $request): JsonResponse
    {
        return $this->productService->update($request, $this->getValidatorRules(true));
    }

    public function copy(Request $request): JsonResponse
    {
        return $this->productService->copy($request, $this->getValidatorRules());
    }

    public function delete(Request $request): JsonResponse
    {
        return $this->productService->delete($request);
    }

    public function updatePosition(Request $request) {
        $this->productService->updatePosition($request);
    }


    public function updatePositionManually(Request $request): JsonResponse
    {
        return $this->productService->updatePositionManually($request);
    }

    public function bulkActivate(Request $request): JsonResponse
    {
        return $this->productService->bulkActivate($request);
    }

    public function bulkDeactivate(Request $request): JsonResponse
    {
        return $this->productService->bulkDeactivate($request);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        return $this->productService->bulkDelete($request);
    }
}
