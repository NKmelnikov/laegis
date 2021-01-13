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
    Route::post('/get-brand-by-slug', 'Admin\BrandController@getBySlug');
    Route::get('/get-catalogs', 'Admin\CatalogController@getAll');
    Route::get('/get-posts', 'Admin\NewsController@getAll');
    Route::get('/get-categories', 'Admin\CategoryController@getAll');
    Route::post('/get-category-by-id', 'Admin\CategoryController@getById');
    Route::get('/get-subcategories', 'Admin\SubcategoryController@getAll');
    Route::post('/get-by-category-id', 'Admin\SubcategoryController@getByCategoryId');
    Route::get('/get-products-oil', 'Admin\ProductsOilController@getAll');
    Route::get('/get-products-oil-by-brand', 'Admin\ProductsOilController@getAllBrand');
    Route::post('/get-product-oil-by-slug', 'Admin\ProductsOilController@getBySlug');
    Route::post('/get-product-oil-by-category-slug', 'Admin\ProductsOilController@getByCategorySlug');
    Route::post('/get-product-oil-by-subcategory-slug', 'Admin\ProductsOilController@getBySubcategorySlug');
    Route::post('/get-product-oil-by-brand-slug', 'Admin\ProductsOilController@getByBrandSlug');
    Route::get('/get-products-drill', 'Admin\ProductsDrillController@getAll');
    Route::get('/get-metalworking', 'Admin\MetalworkingController@getAll');
    Route::post('/get-news-item-by-slug', 'Admin\NewsController@getBySlug');
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
//        catalog
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

});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
