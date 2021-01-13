<?php


namespace App\Services\Admin;


use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use function response;


class BrandService extends BaseService
{


    public function getBySlug(Request $request)
    {
        try {
            return Brand::with('catalogs')->where('slug', $request['slug'])->first();
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
