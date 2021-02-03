<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function response;

class UploadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadImg(Request $request): JsonResponse
    {

        try {
            $time = time();
            $name = $time . '__' .$request->image->getClientOriginalName();
            $request->image->move(public_path('/uploads/img'), $name);
            return response()->json(["path" => '/uploads/img/'.$name]);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function uploadPdf(Request $request)
    {
        try {
            $time = time();
            $name = $time . '__' .$request->pdf->getClientOriginalName();
            $request->pdf->move(public_path('/uploads/pdf'), $name);
            return response()->json(["path" => '/uploads/pdf/'.$name]);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function frolaUpload(Request $request): JsonResponse
    {

        $time = time();
        $name = $request->file('file')->getClientOriginalName();
        $url = sprintf('%s%s/uploads/img/%s_%s', env('APP_URL'), env('APP_PORT'), $time, $name);

        try {
            $request->file('file')->move(public_path('/uploads/img'), $time . '_' . $name);
            return response()->json(['link' => $url]);
        } catch (Exception $e) {
            return response()->json(['uploaded' => true, 'error' => ['message' => $e->getMessage()]], 400);
        }
    }

//    private function uniqueName($path){
//        $new_path = '';
//        list($directory, , $extension, $filename) = array_values(pathinfo($path));
//
//        if(!Storage::exists($path)) {
//            Log::info('exists?');
//            return $path;
//        }
//
//        $i = 0;
//        while (Storage::exists($path))
//        {
//            $new_path = $directory . '/' . $filename . '-' . $i . '.' . $extension;
//            $i++;
//        }
//
//        if ($path !== $new_path && !rename($path, $new_path))
//        {
//            throw new Exception('Error renaming `'.$path.'` to `'.$new_path.'`');
//        }
//
//
//        return $new_path;
//
//    }
}
