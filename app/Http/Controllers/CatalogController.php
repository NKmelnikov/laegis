<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\News;
use App\Services\Admin\BaseService;
use App\Services\Admin\BrandService;
use App\Services\Admin\CatalogService;
use App\Services\Admin\NewsService;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    private CatalogService $catalogService;
    private BaseService $brandService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->catalogService = new CatalogService(Catalog::class);
        $this->brandService = new BrandService(Brand::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $brands = $this->brandService->getAll();
        SEOMeta::setTitle(__('layouts.header.catalogs'), false);
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
        return view('home.catalog.index', ['locale' => app()->getLocale(), 'brands' => $brands->getData()]);
    }

    public function item(Request $request, $locale, $slug): Renderable
    {
        $brand = $this->brandService->getBySlug($request);
        $catalogs = $this->catalogService->getByBrandSlug($request);

        SEOMeta::setTitle(translate($brand, 'name'), false);
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
        return view('home.catalog.item', ['locale' => app()->getLocale(), 'catalogs' => $catalogs, 'brand' => $brand]);
    }

    public function getByBrandSlug(Request $request)
    {
        return $this->catalogService->getByBrandSlug($request);
    }

    public function getAll(): JsonResponse
    {
        return $this->brandService->getAll();
    }
}
