<?php


namespace App\Services\Admin;


use App\Models\Metalworking;
use Exception;
use Illuminate\Http\Request;

class MetalworkingService extends BaseService
{
    public function getById(Request $request)
    {
        try {
            return Metalworking::where('id', $request['id'])->first();
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
