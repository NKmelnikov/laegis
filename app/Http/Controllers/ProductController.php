<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\Admin\ProductService;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    private ProductService $productService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->productService = new ProductService(Product::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $products = Product::with(['category', 'subcategory', 'brand'])
            ->orderBy('position')
            ->paginate(10);

        SEOMeta::setTitle('Products');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('https://codecasts.com.br/lesson');
        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl('http://current.url.com');
        OpenGraph::addProperty('type', 'articles');
        TwitterCard::setTitle('Homepage');
        TwitterCard::setSite('@LuizVinicius73');
        JsonLd::setTitle('Homepage');
        JsonLd::setDescription('This is my page description');
        JsonLd::addImage('https://codecasts.com.br/img/logo.jpg');

        return view(
            'home.product.index',
            [
                'products' => $products->toJson(),
                'categories' => $this->getCategories(),
            ]
        );
    }

    public function category(Request $request): Renderable
    {


        $products = $this->productService->getByCategorySlug($request, true);

        return view(
            'home.product.index',
            [
                'products' => $products->toJson(),
                'categories' => $this->getCategories(),
            ]
        );
    }

    public function getCategories() {
        $categories = Category::with('subcategories')
            ->orderBy('position')
            ->get();

        $brands = Brand::orderBy('position')->get();

        $brandCollection = collect([
            'id' => 9999,
            'position' => 9999,
            'name' => 'Бренды',
            'name_en' => 'Brands',
            'slug' => 'brands',
            'active' => 1,
            'subcategories' => []
        ]);

        $brandCollection->put('subcategories', $brands);
        $categories[] = $brandCollection;

        return $categories;
    }
}
