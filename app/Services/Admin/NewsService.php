<?php


namespace App\Services\Admin;


use App\Models\News;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function response;


class NewsService extends BaseService
{
    public function getBySlug(Request $request)
    {
        try {
            return News::where('slug', $request['slug'])->first();
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
