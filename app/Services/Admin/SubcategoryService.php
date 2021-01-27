<?php


namespace App\Services\Admin;


use App\Models\Subcategory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function response;

class SubcategoryService extends BaseService
{

    public function getAllPaginated(): JsonResponse
    {
        $subcategories = DB::table('subcategories as  s')
            ->leftJoin('categories as c', 's.category_id', '=', 'c.id')
            ->select('s.id as id',
                's.category_id',
                'c.name as category_name',
                's.active',
                's.position',
                's.name',
                's.name_en',
                's.slug',
                's.description',
                's.description_en',
                's.created_at')
            ->orderBy('s.position')
            ->paginate(15);
        try {
            return response()->json($subcategories);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getById(Request $request)
    {
        try {
            return Subcategory::where('id', $request['id'])->first();
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getBySlug(Request $request)
    {
        try {
            $subcategories = DB::table('subcategories as  s')
                ->leftJoin('categories as c', 's.category_id', '=', 'c.id')
                ->select('s.id as id',
                    's.category_id',
                    'c.name as category_name',
                    'c.name_en as category_name_en',
                    'c.slug as category_slug',
                    's.active',
                    's.position',
                    's.name',
                    's.name_en',
                    's.slug',
                    's.description',
                    's.description_en',
                    's.created_at')
                ->where('s.slug', $request['slug'])
                ->first();
            return response()->json($subcategories);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getByCategoryId(Request $request)
    {
        $result = DB::table('subcategories as s')
            ->join('categories as c', 's.category_id', '=', 'c.id')
            ->where('c.id', '=', $request['id'])
            ->select('s.*')
            ->get();
        try {
            return response()->json($result);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
