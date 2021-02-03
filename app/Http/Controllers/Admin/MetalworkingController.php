<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Metalworking;
use App\Services\Admin\MetalworkingService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MetalworkingController extends Controller
{
    private MetalworkingService $metalworkingService;

    public function __construct()
    {
        $this->metalworkingService = new MetalworkingService(Metalworking::class);
        $this->middleware('auth');

    }

    private function getValidatorRules(): array
    {
        return [
            "active" => "required",
            "name" => "nullable",
            "name_en" => "nullable",
            "description" => "nullable",
            "description_en" => "nullable",
            "imgPath" => "required|string|min:2|max:255",
        ];
    }

    public function getCopyView(Request $request): Renderable {
        $entity = $this->metalworkingService->getById($request);
        $entity->action = 'copy';
        return view('admin.service.edit')->with(['entity' => $entity]);
    }

    public function getEditView(Request $request): Renderable {
        $entity = $this->metalworkingService->getById($request);
        $entity->action = 'edit';
        return view('admin.service.edit')->with(['entity' => $entity]);
    }

    public function getAll(): JsonResponse
    {
        return $this->metalworkingService->getAll();
    }

    public function getAllPaginated(): JsonResponse
    {
        return $this->metalworkingService->getAllPaginated();
    }

    public function getById(Request $request): JsonResponse
    {
        return $this->metalworkingService->getById($request);
    }

    public function create(Request $request): JsonResponse
    {
        return $this->metalworkingService->create($request, $this->getValidatorRules());
    }

    public function update(Request $request): JsonResponse
    {
        return $this->metalworkingService->update($request, $this->getValidatorRules());
    }

    public function copy(Request $request): JsonResponse
    {
        return $this->metalworkingService->copy($request, $this->getValidatorRules());
    }

    public function delete(Request $request): JsonResponse
    {
        return $this->metalworkingService->delete($request);
    }

    public function updatePosition(Request $request)
    {
        $this->metalworkingService->updatePosition($request);
    }

    public function updatePositionManually(Request $request): JsonResponse
    {
        return $this->metalworkingService->updatePositionManually($request);
    }

    public function bulkActivate(Request $request): JsonResponse
    {
        return $this->metalworkingService->bulkActivate($request);
    }

    public function bulkDeactivate(Request $request): JsonResponse
    {
        return $this->metalworkingService->bulkDeactivate($request);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        return $this->metalworkingService->bulkDelete($request);
    }
}
