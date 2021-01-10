<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Services\Admin\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService(Product::class);
    }

    public function getAll() {
        return $this->productService->getAll();
    }

    private function getValidatorRules($isUpdateMethod = false): array
    {

        return [
            "brand_id" => "nullable",
            "category_id" => "required",
            "subcategory_id" => "nullable",
            "active" => "required",
            "name" => "required|min:2|max:255",
            "slug" => ($isUpdateMethod) ? "required|min:2|max:255" : "required|min:2|max:255|unique:products_oil",
            "description" => "nullable",
            "spec" => "nullable",
            "imgPath" => "required|min:2|max:255",
            "pdf1Path" => "nullable|min:2|max:255",
            "pdf2Path" => "nullable|min:2|max:255",
        ];
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
}
