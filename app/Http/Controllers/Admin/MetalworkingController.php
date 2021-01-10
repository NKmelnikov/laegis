<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Metalworking;
use App\Services\Admin\MetalworkingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MetalworkingController
{
    private MetalworkingService $metalworkingService;

    public function __construct()
    {
        $this->metalworkingService = new MetalworkingService(Metalworking::class);
    }

    private function getValidatorRules(): array
    {
        return [
            "active" => "required",
            "name" => "nullable",
            "description" => "nullable",
            "imgPath" => "required|string|min:2|max:255",
        ];
    }

    public function getAll(): JsonResponse
    {
        return $this->metalworkingService->getAll();
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
}
