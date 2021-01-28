<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Services\Admin\BrandService;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ProductService;
use App\Services\Admin\SubcategoryService;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private ProductService $productService;

    private CategoryService $categoryService;

    private SubcategoryService $subcategoryService;

    private BrandService $brandService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->productService = new ProductService(Product::class);
        $this->categoryService = new CategoryService(Category::class);
        $this->subcategoryService = new SubcategoryService(Category::class);
        $this->brandService = new BrandService(Brand::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
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
                'categories' => $this->getCategories(),
                'type' => 'all',
            ]
        );
    }

    public function category(): Renderable
    {
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
                'categories' => $this->getCategories(),
                'type' => 'category',
            ]);
    }

    public function subcategory(): Renderable
    {
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
                'categories' => $this->getCategories(),
                'type' => 'subcategory',
            ]
        );
    }

    public function brandAll(): Renderable
    {
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
                'categories' => $this->getCategories(),
                'type' => 'brandAll',
            ]
        );
    }

    public function brand(): Renderable
    {
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
                'categories' => $this->getCategories(),
                'type' => 'brand',
            ]
        );
    }

    public function item(): Renderable
    {
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
            'home.product.item',
            ['categories' => $this->getCategories()]
        );
    }

    public function getAll()
    {
        return $this->productService->getAllPaginated(true);
    }

    public function getByCategory(Request $request) {
        return $this->productService->getByCategorySlug($request, true);
    }

    public function getBySubcategory(Request $request) {
        return $this->productService->getBySubcategorySlug($request, true);
    }

    public function getAllBrand(Request $request) {
        return $this->productService->getAllBrand($request);
    }

    public function getByBrand(Request $request) {
        return $this->productService->getByBrandSlug($request, true);
    }

    public function getItem(Request $request) {
        return $this->productService->getBySlug($request);
    }

    public function getCategory(Request $request) {
        return $this->categoryService->getBySlug($request);
    }

    public function getSubcategory(Request $request) {
        return $this->subcategoryService->getBySlug($request);
    }

    public function getBrand(Request $request) {
        return $this->brandService->getBySlug($request);
    }

    private function getCategories()
    {
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
