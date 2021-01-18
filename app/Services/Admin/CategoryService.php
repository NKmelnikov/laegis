<?php


namespace App\Services\Admin;


use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use function response;

class CategoryService extends BaseService
{

    public function getAll()
    {
        try {
            return response()->json(Category::with('subcategories')->orderBy('position')->get());
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getById(Request $request)
    {
        try {
            return Category::with('subcategories')->where('id', $request['id'])->first();
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
