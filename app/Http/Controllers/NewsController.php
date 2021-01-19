<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Services\Admin\NewsService;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @var NewsService
     */
    private NewsService $newsService;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->newsService = new NewsService(News::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $news = News::orderBy('position')->paginate(8)->withQueryString();
        SEOMeta::setTitle('About');
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
        return view('home.news.index', ['news' => $news]);
    }

    public function item(Request $request, $locale, $slug): Renderable
    {
        $item = $this->newsService->getBySlug($request);
        SEOMeta::setTitle('About');
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
        return view('home.news.item', ['locale' => app()->getLocale(), 'item' => $item]);
    }
}
