<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\API\CategoriApiController;
use App\Http\Controllers\API\SubCategoriApiController;
use  App\Http\Controllers\API\BrandApiController;
use  App\Http\Controllers\API\UnitApiController;
use  App\Http\Controllers\API\ProductApiController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    Route::post('api/category/store',[CategoriApiController::class,'categoryStore'])->name('category.store');



    Route::post('api/sub-category/store',[SubCategoriApiController::class,'subCategoryStore'])->name('subCategory.store');



    Route::post('api/brand/store',[BrandApiController::class,'BrandStore'])->name('brand.store');




    Route::post('api/unit/store',[UnitApiController::class,'UnitStore'])->name('unit.store');



    Route::post('api/product/store',[ProductApiController::class,'ProductStore'])->name('product.store');





});
