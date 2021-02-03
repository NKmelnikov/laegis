<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Services\Admin\CatalogService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    private CatalogService $catalogService;

    public array $validatorRules = [
        "brand_id" => "required",
        "active" => "required",
        "name" => "string|min:2|max:255",
        "name_en" => "string|min:2|max:255",
        "imgPath" => "required|string|min:2|max:255",
        "pdfPath" => "required|string|min:2|max:255",
    ];

    public function __construct()
    {
        $this->catalogService = new CatalogService(Catalog::class);
        $this->middleware('auth');

    }

    public function getCopyView(Request $request): Renderable {
        $entity = $this->catalogService->getById($request);
        $entity->action = 'copy';
        return view('admin.catalog.edit')->with(['entity' => $entity]);
    }

    public function getEditView(Request $request): Renderable {
        $entity = $this->catalogService->getById($request);
        $entity->action = 'edit';
        return view('admin.catalog.edit')->with(['entity' => $entity]);
    }

    public function getAll(): JsonResponse
    {
        return $this->catalogService->getAll();
    }

    public function getAllPaginated(): JsonResponse
    {
        return $this->catalogService->getAllPaginated();
    }

    public function getById(Request $request): JsonResponse
    {
        return $this->catalogService->getById($request);
    }

    public function create(Request $request): JsonResponse {
        return $this->catalogService->create($request, $this->validatorRules);
    }

    public function copy(Request $request): JsonResponse
    {
        return $this->catalogService->copy($request, $this->validatorRules);
    }

    public function update(Request $request): JsonResponse {
        return $this->catalogService->update($request, $this->validatorRules);
    }

    public function delete(Request $request): JsonResponse {
        return $this->catalogService->delete($request);
    }

    public function updatePosition(): JsonResponse {
        $this->catalogService->updatePosition();
    }

    public function updatePositionManually(Request $request): JsonResponse
    {
        return $this->catalogService->updatePositionManually($request);
    }

    public function bulkActivate(Request $request): JsonResponse
    {
        return $this->catalogService->bulkActivate($request);
    }

    public function bulkDeactivate(Request $request): JsonResponse
    {
        return $this->catalogService->bulkDeactivate($request);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        return $this->catalogService->bulkDelete($request);
    }
}
