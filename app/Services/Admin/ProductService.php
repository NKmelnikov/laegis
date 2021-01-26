<?php


namespace App\Services\Admin;


use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function response;

class ProductService extends BaseService
{
    public function getAll()
    {
        $products = DB::table('products as  p')
            ->leftJoin('brands as b', 'p.brand_id', '=', 'b.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('subcategories as s', 'p.subcategory_id', '=', 's.id')
            ->select('p.id as id',
                'p.brand_id',
                'p.category_id',
                'p.subcategory_id',
                'b.name as brand_name',
                'c.name as category_name',
                'c.slug as category_slug',
                DB::Raw('IFNULL( `s`.`name` , "no-subcategory" ) as subcategory_name'),
                DB::Raw('IFNULL( `s`.`slug` , "no-subcategory" ) as subcategory_slug'),
                'p.active',
                'p.position',
                'p.name',
                'p.slug',
                'p.description',
                'p.spec',
                'p.imgPath',
                'p.pdf1Path',
                'p.pdf2Path',
                'p.created_at')
            ->orderBy('p.position')
            ->get();
        try {
            return response()->json($products);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getAllPaginated($fromView = false)
    {
        $products = DB::table('products as  p')
            ->leftJoin('brands as b', 'p.brand_id', '=', 'b.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('subcategories as s', 'p.subcategory_id', '=', 's.id')
            ->select('p.id as id',
                'p.brand_id',
                'p.category_id',
                'p.subcategory_id',
                'b.name as brand_name',
                'c.name as category_name',
                'c.slug as category_slug',
                DB::Raw('IFNULL( `s`.`name` , "no-subcategory" ) as subcategory_name'),
                DB::Raw('IFNULL( `s`.`slug` , "no-subcategory" ) as subcategory_slug'),
                'p.active',
                'p.position',
                'p.name',
                'p.slug',
                'p.description',
                'p.spec',
                'p.imgPath',
                'p.pdf1Path',
                'p.pdf2Path',
                'p.created_at')
            ->orderBy('p.position');

        if($fromView) {
            return $products->paginate(10);
        }

        try {
            return response()->json($products->paginate(15));
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getBySlug(Request $request)
    {
        $slug = $request['slug'];
        $entity = DB::table('products as  p')
            ->leftJoin('brands as b', 'p.brand_id', '=', 'b.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('subcategories as s', 'p.subcategory_id', '=', 's.id')
            ->select('p.id as id',
                'p.brand_id',
                'p.category_id',
                'p.subcategory_id',
                'b.name as brand_name',
                'c.name as category_name',
                'c.slug as category_slug',
                DB::Raw('IFNULL( `s`.`name` , "no-subcategory" ) as subcategory_name'),
                DB::Raw('IFNULL( `s`.`slug` , "no-subcategory" ) as subcategory_slug'),
                'p.active',
                'p.position',
                'p.name',
                'p.name_en',
                'p.slug',
                'p.description',
                'p.description_en',
                'p.spec',
                'p.spec_en',
                'p.imgPath',
                'p.pdf1Path',
                'p.pdf2Path',
                'p.created_at')
            ->where('p.slug', $slug)
            ->first();

        try {
            return $entity;
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getByCategorySlug(Request $request, $fromView = false)
    {

        $products = DB::table('products as  p')
            ->leftJoin('brands as b', 'p.brand_id', '=', 'b.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('subcategories as s', 'p.subcategory_id', '=', 's.id')
            ->select('p.id as id',
                'p.brand_id',
                'p.category_id',
                'p.subcategory_id',
                'b.name as brand_name',
                'c.name as category_name',
                'c.slug as category_slug',
                DB::Raw('IFNULL( `s`.`name` , "no-subcategory" ) as subcategory_name'),
                DB::Raw('IFNULL( `s`.`slug` , "no-subcategory" ) as subcategory_slug'),
                'p.active',
                'p.position',
                'p.name',
                'p.slug',
                'p.description',
                'p.spec',
                'p.imgPath',
                'p.pdf1Path',
                'p.pdf2Path',
                'p.created_at')
            ->where('c.slug', $request['slug']);

        if($fromView) {
            return $products->paginate(10);
        }

        try {
            return response()->json($products->get());
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getBySubcategorySlug(Request $request, $fromView = false)
    {

        $products = DB::table('products as  p')
            ->leftJoin('brands as b', 'p.brand_id', '=', 'b.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('subcategories as s', 'p.subcategory_id', '=', 's.id')
            ->select('p.id as id',
                'p.brand_id',
                'p.category_id',
                'p.subcategory_id',
                'b.name as brand_name',
                'c.name as category_name',
                'c.slug as category_slug',
                DB::Raw('IFNULL( `s`.`name` , "no-subcategory" ) as subcategory_name'),
                DB::Raw('IFNULL( `s`.`slug` , "no-subcategory" ) as subcategory_slug'),
                'p.active',
                'p.position',
                'p.name',
                'p.slug',
                'p.description',
                'p.spec',
                'p.imgPath',
                'p.pdf1Path',
                'p.pdf2Path',
                'p.created_at')
            ->where('s.slug', $request['slug']);

        if($fromView) {
            return $products->paginate(10);
        }

        try {
            return response()->json($products->get());
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    public function getAllBrand($fromView = false)
    {

        $products = DB::table('products as  p')
            ->leftJoin('brands as b', 'p.brand_id', '=', 'b.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('subcategories as s', 'p.subcategory_id', '=', 's.id')
            ->select('p.id as id',
                'p.brand_id',
                'p.category_id',
                'p.subcategory_id',
                'b.name as brand_name',
                'c.name as category_name',
                'c.slug as category_slug',
                DB::Raw('IFNULL( `s`.`name` , "no-subcategory" ) as subcategory_name'),
                DB::Raw('IFNULL( `s`.`slug` , "no-subcategory" ) as subcategory_slug'),
                'p.active',
                'p.position',
                'p.name',
                'p.slug',
                'p.description',
                'p.spec',
                'p.imgPath',
                'p.pdf1Path',
                'p.pdf2Path',
                'p.created_at')
            ->whereNotNull('p.brand_id')
            ->orderBy('p.position');

        if($fromView) {
            return $products->paginate(10);
        }

        try {
            return response()->json($products->get());
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }


    public function getByBrandSlug(Request $request, $fromView = false)
    {

        $products = DB::table('products as  p')
            ->leftJoin('brands as b', 'p.brand_id', '=', 'b.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->leftJoin('subcategories as s', 'p.subcategory_id', '=', 's.id')
            ->select('p.id as id',
                'p.brand_id',
                'p.category_id',
                'p.subcategory_id',
                'b.name as brand_name',
                'b.slug as brand_slug',
                'c.name as category_name',
                'c.slug as category_slug',
                DB::Raw('IFNULL( `s`.`name` , "no-subcategory" ) as subcategory_name'),
                DB::Raw('IFNULL( `s`.`slug` , "no-subcategory" ) as subcategory_slug'),
                'p.active',
                'p.position',
                'p.name',
                'p.slug',
                'p.description',
                'p.spec',
                'p.imgPath',
                'p.pdf1Path',
                'p.pdf2Path',
                'p.created_at')
            ->where('b.slug', $request['slug']);

        if($fromView) {
            return $products->paginate(10);
        }

        try {
            return response()->json($products->get());
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
