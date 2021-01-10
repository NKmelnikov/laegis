<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Services\Admin\NewsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController
{
    private NewsService $newsService;

    public function __construct()
    {
        $this->newsService = new NewsService(News::class);
    }

    private function getValidatorRules($isUpdateMethod = false): array
    {

        return [
            "active" => "required",
            "slug" => ($isUpdateMethod) ? "required|min:2|max:200" : "required|min:2|max:200|unique:news",
            "title" => "required|min:2|max:255",
            "shortText" => "required|min:2|max:400",
            "article" => "required",
            "imgPath" => "required|string|min:2|max:255",
        ];
    }

    public function getAll(): JsonResponse
    {
        return $this->newsService->getAll();
    }

    public function getNewsItemBySlug(Request $request): JsonResponse
    {
        return $this->newsService->getNewsItemBySlug($request);
    }

    public function create(Request $request): JsonResponse
    {
        return $this->newsService->create($request, $this->getValidatorRules());
    }

    public function update(Request $request): JsonResponse
    {
        return $this->newsService->update($request, $this->getValidatorRules(true));
    }

    public function copy(Request $request): JsonResponse
    {
        return $this->newsService->copy($request, $this->getValidatorRules());
    }

    public function delete(Request $request): JsonResponse
    {
        return $this->newsService->delete($request);
    }

    public function updatePosition(Request $request)
    {
        $this->newsService->updatePosition($request);
    }
}
