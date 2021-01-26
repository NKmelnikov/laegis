<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => 'home'], function () {
    Route::get('/get-brands', [App\Http\Controllers\Admin\BrandController::class, 'getAll']);
    Route::post('/catalog/getByBrandSlug', [App\Http\Controllers\CatalogController::class, 'getByBrandSlug']);
    Route::get('/product/get-all', [App\Http\Controllers\ProductController::class, 'getAll']);
    Route::post('/product/get-by-category', [App\Http\Controllers\ProductController::class, 'getByCategory']);
    Route::post('/product/get-by-subcategory', [App\Http\Controllers\ProductController::class, 'getBySubcategory']);
    Route::get('/product/get-all-brand', [App\Http\Controllers\ProductController::class, 'getAllBrand']);
    Route::post('/product/get-by-brand', [App\Http\Controllers\ProductController::class, 'getByBrand']);
    Route::post('/product/get-item', [App\Http\Controllers\ProductController::class, 'getItem']);
});

Route::post('/frola-upload', [App\Http\Controllers\Admin\UploadController::class, 'frolaUpload']);
Route::post('/upload-img', [App\Http\Controllers\Admin\UploadController::class, 'uploadImg']);
Route::post('/upload-pdf', [App\Http\Controllers\Admin\UploadController::class, 'uploadPdf']);
Route::post('/check-recaptcha', 'RecaptchaController@checkValidity');

Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.main');
//        brands
    Route::view('/brand', 'admin.brand.index');
    Route::view('/brand/create', 'admin.brand.edit');
    Route::get('/brand/getAllPaginated', [App\Http\Controllers\Admin\BrandController::class, 'getAllPaginated']);
    Route::get('/brand/getAll', [App\Http\Controllers\Admin\BrandController::class, 'getAll']);
    Route::get('/brand/copy/{slug}', [App\Http\Controllers\Admin\BrandController::class, 'getCopyView']);
    Route::get('/brand/edit/{slug}', [App\Http\Controllers\Admin\BrandController::class, 'getEditView']);
    Route::get('/brand/delete/{slug}', [App\Http\Controllers\Admin\BrandController::class, 'delete']);
    Route::post('/create-brand', [App\Http\Controllers\Admin\BrandController::class, 'create']);
    Route::post('/copy-brand', [App\Http\Controllers\Admin\BrandController::class, 'copy']);
    Route::post('/edit-brand', [App\Http\Controllers\Admin\BrandController::class, 'update']);
    Route::post('/bulk-activate-brand', [App\Http\Controllers\Admin\BrandController::class, 'bulkActivate']);
    Route::post('/bulk-deactivate-brand', [App\Http\Controllers\Admin\BrandController::class, 'bulkDeactivate']);
    Route::post('/bulk-delete-brand', [App\Http\Controllers\Admin\BrandController::class, 'bulkDelete']);
    Route::post('/update-brand-position-manually', [App\Http\Controllers\Admin\BrandController::class, 'updatePositionManually']);
//        news
    Route::view('/news', 'admin.news.index');
    Route::view('/news/create', 'admin.news.edit');
    Route::get('/news/getAllPaginated', [App\Http\Controllers\Admin\NewsController::class, 'getAllPaginated']);
    Route::get('/news/copy/{slug}', [App\Http\Controllers\Admin\NewsController::class, 'getCopyView']);
    Route::get('/news/edit/{slug}', [App\Http\Controllers\Admin\NewsController::class, 'getEditView']);
    Route::get('/news/delete/{slug}', [App\Http\Controllers\Admin\NewsController::class, 'delete']);
    Route::post('/create-news', [App\Http\Controllers\Admin\NewsController::class, 'create']);
    Route::post('/copy-news', [App\Http\Controllers\Admin\NewsController::class, 'copy']);
    Route::post('/edit-news', [App\Http\Controllers\Admin\NewsController::class, 'update']);
    Route::post('/bulk-activate-news', [App\Http\Controllers\Admin\NewsController::class, 'bulkActivate']);
    Route::post('/bulk-deactivate-news', [App\Http\Controllers\Admin\NewsController::class, 'bulkDeactivate']);
    Route::post('/bulk-delete-news', [App\Http\Controllers\Admin\NewsController::class, 'bulkDelete']);
    Route::post('/update-news-position-manually', [App\Http\Controllers\Admin\NewsController::class, 'updatePositionManually']);
//        catalog
    Route::view('/catalog', 'admin.catalog.index');
    Route::view('/catalog/create', 'admin.catalog.edit');
    Route::get('/catalog/getAllPaginated', [App\Http\Controllers\Admin\CatalogController::class, 'getAllPaginated']);
    Route::get('/catalog/copy/{id}', [App\Http\Controllers\Admin\CatalogController::class, 'getCopyView']);
    Route::get('/catalog/edit/{id}', [App\Http\Controllers\Admin\CatalogController::class, 'getEditView']);
    Route::get('/catalog/delete/{id}', [App\Http\Controllers\Admin\CatalogController::class, 'delete']);
    Route::post('/create-catalog', [App\Http\Controllers\Admin\CatalogController::class, 'create']);
    Route::post('/copy-catalog', [App\Http\Controllers\Admin\CatalogController::class, 'copy']);
    Route::post('/edit-catalog', [App\Http\Controllers\Admin\CatalogController::class, 'update']);
    Route::post('/bulk-activate-catalog', [App\Http\Controllers\Admin\CatalogController::class, 'bulkActivate']);
    Route::post('/bulk-deactivate-catalog', [App\Http\Controllers\Admin\CatalogController::class, 'bulkDeactivate']);
    Route::post('/bulk-delete-catalog', [App\Http\Controllers\Admin\CatalogController::class, 'bulkDelete']);
    Route::post('/update-catalog-position-manually', [App\Http\Controllers\Admin\CatalogController::class, 'updatePositionManually']);
//        service
    Route::view('/service', 'admin.service.index');
    Route::view('/service/create', 'admin.service.edit');
    Route::get('/service/getAllPaginated', [App\Http\Controllers\Admin\MetalworkingController::class, 'getAllPaginated']);
    Route::get('/service/copy/{id}', [App\Http\Controllers\Admin\MetalworkingController::class, 'getCopyView']);
    Route::get('/service/edit/{id}', [App\Http\Controllers\Admin\MetalworkingController::class, 'getEditView']);
    Route::get('/service/delete/{id}', [App\Http\Controllers\Admin\MetalworkingController::class, 'delete']);
    Route::post('/create-service', [App\Http\Controllers\Admin\MetalworkingController::class, 'create']);
    Route::post('/copy-service', [App\Http\Controllers\Admin\MetalworkingController::class, 'copy']);
    Route::post('/edit-service', [App\Http\Controllers\Admin\MetalworkingController::class, 'update']);
    Route::post('/bulk-activate-service', [App\Http\Controllers\Admin\MetalworkingController::class, 'bulkActivate']);
    Route::post('/bulk-deactivate-service', [App\Http\Controllers\Admin\MetalworkingController::class, 'bulkDeactivate']);
    Route::post('/bulk-delete-service', [App\Http\Controllers\Admin\MetalworkingController::class, 'bulkDelete']);
    Route::post('/update-service-position-manually', [App\Http\Controllers\Admin\MetalworkingController::class, 'updatePositionManually']);
//        category
    Route::view('/category', 'admin.category.index');
    Route::view('/category/create', 'admin.category.edit');
    Route::get('/category/getAll', [App\Http\Controllers\Admin\CategoryController::class, 'getAll']);
    Route::get('/category/getAllPaginated', [App\Http\Controllers\Admin\CategoryController::class, 'getAllPaginated']);
    Route::get('/category/copy/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'getCopyView']);
    Route::get('/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'getEditView']);
    Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);
    Route::post('/create-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/copy-category', [App\Http\Controllers\Admin\CategoryController::class, 'copy']);
    Route::post('/edit-category', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::post('/bulk-activate-category', [App\Http\Controllers\Admin\CategoryController::class, 'bulkActivate']);
    Route::post('/bulk-deactivate-category', [App\Http\Controllers\Admin\CategoryController::class, 'bulkDeactivate']);
    Route::post('/bulk-delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'bulkDelete']);
    Route::post('/update-category-position-manually', [App\Http\Controllers\Admin\CategoryController::class, 'updatePositionManually']);
//        subcategory
    Route::view('/subcategory', 'admin.subcategory.index');
    Route::view('/subcategory/create', 'admin.subcategory.edit');
    Route::get('/subcategory/getAll', [App\Http\Controllers\Admin\SubcategoryController::class, 'getAll']);
    Route::get('/subcategory/getAllPaginated', [App\Http\Controllers\Admin\SubcategoryController::class, 'getAllPaginated']);
    Route::post('/subcategory/getByCategoryId', [App\Http\Controllers\Admin\SubcategoryController::class, 'getByCategoryId']);
    Route::get('/subcategory/copy/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'getCopyView']);
    Route::get('/subcategory/edit/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'getEditView']);
    Route::get('/subcategory/delete/{id}', [App\Http\Controllers\Admin\SubcategoryController::class, 'delete']);
    Route::post('/create-subcategory', [App\Http\Controllers\Admin\SubcategoryController::class, 'create']);
    Route::post('/copy-subcategory', [App\Http\Controllers\Admin\SubcategoryController::class, 'copy']);
    Route::post('/edit-subcategory', [App\Http\Controllers\Admin\SubcategoryController::class, 'update']);
    Route::post('/bulk-activate-subcategory', [App\Http\Controllers\Admin\SubcategoryController::class, 'bulkActivate']);
    Route::post('/bulk-deactivate-subcategory', [App\Http\Controllers\Admin\SubcategoryController::class, 'bulkDeactivate']);
    Route::post('/bulk-delete-subcategory', [App\Http\Controllers\Admin\SubcategoryController::class, 'bulkDelete']);
    Route::post('/update-subcategory-position-manually', [App\Http\Controllers\Admin\SubcategoryController::class, 'updatePositionManually']);
//        products
    Route::view('/product', 'admin.product.index');
    Route::view('/product/create', 'admin.product.edit');
    Route::get('/product/getAll', [App\Http\Controllers\Admin\ProductController::class, 'getAll']);
    Route::get('/product/getAllPaginated', [App\Http\Controllers\Admin\ProductController::class, 'getAllPaginated']);
    Route::get('/product/copy/{slug}', [App\Http\Controllers\Admin\ProductController::class, 'getCopyView']);
    Route::get('/product/edit/{slug}', [App\Http\Controllers\Admin\ProductController::class, 'getEditView']);
    Route::get('/product/delete/{slug}', [App\Http\Controllers\Admin\ProductController::class, 'delete']);
    Route::post('/create-product', [App\Http\Controllers\Admin\ProductController::class, 'create']);
    Route::post('/copy-product', [App\Http\Controllers\Admin\ProductController::class, 'copy']);
    Route::post('/edit-product', [App\Http\Controllers\Admin\ProductController::class, 'update']);
    Route::post('/bulk-activate-product', [App\Http\Controllers\Admin\ProductController::class, 'bulkActivate']);
    Route::post('/bulk-deactivate-product', [App\Http\Controllers\Admin\ProductController::class, 'bulkDeactivate']);
    Route::post('/bulk-delete-product', [App\Http\Controllers\Admin\ProductController::class, 'bulkDelete']);
    Route::post('/update-product-position-manually', [App\Http\Controllers\Admin\ProductController::class, 'updatePositionManually']);
});

Auth::routes();

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::get('/about', function () {
    return redirect(app()->getLocale() . '/about');
});

Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'
], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
    Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
    Route::get('/news/{slug}', [App\Http\Controllers\NewsController::class, 'item'])->name('news-item');
    Route::get('/catalogs', [App\Http\Controllers\CatalogController::class, 'index'])->name('catalogs');
    Route::get('/catalogs/{slug}', [App\Http\Controllers\CatalogController::class, 'item'])->name('catalog-item');
    Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');
    Route::get('/services/metalworking', [App\Http\Controllers\ServiceController::class, 'metalworking'])->name('services-metalworking');
    Route::get('/services/recovery', [App\Http\Controllers\ServiceController::class, 'recovery'])->name('services-recovery');
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/products/brands', [App\Http\Controllers\ProductController::class, 'brandAll'])->name('product-by-brand');
    Route::get('/products/brands/{brandSlug}', [App\Http\Controllers\ProductController::class, 'brand'])->name('product-by-brand-item');
    Route::get('/products/{categorySlug}', [App\Http\Controllers\ProductController::class, 'category'])->name('products-by-category');
    Route::get('/products/{categorySlug}/{subcategorySlug}', [App\Http\Controllers\ProductController::class, 'subcategory'])->name('products-by-subcategory');
    Route::get('/products/{categorySlug}/{subcategorySlug}/{productsSlug}', [App\Http\Controllers\ProductController::class, 'item'])->name('product');
});




