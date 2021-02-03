<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\Admin\NewsService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    private NewsService $newsService;

    public function __construct()
    {
        $this->newsService = new NewsService(News::class);
        $this->middleware('auth');

    }

    private function getValidatorRules($isUpdateMethod = false): array
    {

        return [
            "active" => "required",
            "slug" => ($isUpdateMethod) ? "required|min:2|max:200" : "required|min:2|max:200|unique:news",
            "title" => "required|min:2|max:255",
            "title_en" => "required|min:2|max:255",
            "shortText" => "required|min:2|max:400",
            "shortText_en" => "required|min:2|max:400",
            "article" => "required",
            "article_en" => "required",
            "imgPath" => "required|string|min:2|max:255",
        ];
    }

    public function getCopyView(Request $request): Renderable {
        $entity = $this->newsService->getBySlug($request);
        $entity->action = 'copy';
        return view('admin.news.edit')->with(['entity' => $entity]);
    }

    public function getEditView(Request $request): Renderable {
        $entity = $this->newsService->getBySlug($request);
        $entity->action = 'edit';
        return view('admin.news.edit')->with(['entity' => $entity]);
    }

    public function getAll(): JsonResponse
    {
        return $this->newsService->getAll();
    }

    public function getAllPaginated(): JsonResponse
    {
        return $this->newsService->getAllPaginated();
    }

    public function getBySlug(Request $request): JsonResponse
    {
        return $this->newsService->getBySlug($request);
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

    public function updatePositionManually(Request $request): JsonResponse
    {
        return $this->newsService->updatePositionManually($request);
    }

    public function bulkActivate(Request $request): JsonResponse
    {
        return $this->newsService->bulkActivate($request);
    }

    public function bulkDeactivate(Request $request): JsonResponse
    {
        return $this->newsService->bulkDeactivate($request);
    }

    public function bulkDelete(Request $request): JsonResponse
    {
        return $this->newsService->bulkDelete($request);
    }
}
