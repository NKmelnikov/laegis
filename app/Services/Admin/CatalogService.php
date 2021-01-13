<?php


namespace App\Services\Admin;

use App\Models\Catalog;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function response;

class CatalogService extends BaseService
{

    public function getAll(): JsonResponse
    {
        $catalogs = DB::table('catalogs as c')
            ->leftJoin('brands as b', 'c.brand_id', '=', 'b.id')
            ->select('c.id as id',
                   'c.brand_id',
                   'b.name as brand_name',
                   'c.active',
                   'c.position',
                   'c.name',
                   'c.imgPath',
                   'c.pdfPath',
                   'c.created_at')
            ->orderBy('c.position')
            ->get();
        try {
            return response()->json($catalogs);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getById(Request $request)
    {
        try {
            return Catalog::with('brands')->where('id', $request['id'])->first();
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
