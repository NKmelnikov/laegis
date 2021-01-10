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
    Route::post('/get-news-item-by-slug', 'Admin\NewsController@getNewsItemBySlug');
});

Route::post('/frola-upload', [App\Http\Controllers\Admin\UploadController::class, 'frolaUpload']);
Route::post('/upload-img', [App\Http\Controllers\Admin\UploadController::class, 'uploadImg']);
Route::post('/upload-pdf', 'Admin\UploadController@uploadPdf');
Route::post('/check-recaptcha', 'RecaptchaController@checkValidity');

Route::prefix('admin')->group(function () {
//        brands
    Route::view('/', 'admin.main');
    Route::view('/brand', 'admin.brand.index');
    Route::view('/brand/create', 'admin.brand.create');
    Route::post('/create-brand', [App\Http\Controllers\Admin\BrandController::class, 'create']);
//        news
    Route::view('/news', 'admin.news');

});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
