<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\ImageController;
use \App\Http\Controllers\ApiLogController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\MacroCategoryController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//API FAQ
    Route::get('/faq/paginate',[FaqController::class, 'getAllPaginateFaq']);
    Route::post('/faq/new', [FaqController::class, 'create']);
    Route::get('/faq/get/{id}', [FaqController::class, 'getFaq']);
    Route::get('/faq', [FaqController::class, 'getAllFaqs']);
    Route::post('/faq/edit/{id}', [FaqController::class, 'editFaq']);
    Route::delete('/faq/delete/{id}', [FaqController::class, 'deleteFaq']);

//API CONDITION
Route::prefix('condition')->group(function () {
    Route::post('/new', [ConditionController::class, 'create']);
    Route::get('/{id}', [ConditionController::class, 'getCondition']);
    Route::get('/', [ConditionController::class, 'getAllConditions']);
    Route::put('/{id}', [ConditionController::class, 'editCondition']);
    Route::delete('/{id}', [ConditionController::class, 'deleteCondition']);
});

//API CONTACT
Route::prefix('contact')->group(function () {
    Route::post('/', [ContactController::class, 'create']);
    Route::get('/{id}', [ContactController::class, 'getContact']);
    Route::get('/image/{id}', [ContactController::class, 'getImage']);
    Route::get('/', [ContactController::class, 'getAllContacts']);
    Route::put('/{id}', [ContactController::class, 'editContact']);
    Route::delete('/{id}', [ContactController::class, 'deleteContact']);
});

//API IMAGES
Route::prefix('images')->group(function () {
    Route::post('/', [ImageController::class, 'create']);
    Route::get('/{id}', [ImageController::class, 'getImage']);
    Route::get('/', [ImageController::class, 'getAllImages']);
    Route::put('/{id}', [ImageController::class, 'editImage']);
    Route::delete('/{id}', [ImageController::class, 'deleteImage']);
});

//API PRODUCTS
    Route::post('/product/new', [ProductController::class, 'create']);
    Route::get('/products/paginate', [ProductController::class, 'getAllPaginateProducts']);
    Route::get('/product/get/{id}', [ProductController::class, 'getProduct'])->where('id', '\d+');;
    Route::get('/products', [ProductController::class, 'getAllAscProducts']);
    Route::put('/produtct/edit/{id}', [ProductController::class, 'editProduct']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct']);


//API ALL CATEGORIES
Route::prefix('categories')->group(function () {
    //API MACRO 
    // Route::post('/macro', [MacroCategoryController::class, 'create']);
    // Route::get('/macro/{id}', [MacroCategoryController::class, 'getMacroCategory']);
    // Route::get('/macro', [MacroCategoryController::class, 'getAllMacroCategories']);
    // Route::put('/macro/{id}', [MacroCategoryController::class, 'editMacroCategory']);
    // Route::delete('/macro/{id}', [MacroCategoryController::class, 'deleteMacroCategory']);

    //API CATEGORY
    Route::post('/cat', [CategoryController::class, 'create']);
    Route::get('/cat/{id}', [CategoryController::class, 'getCategory']);
    Route::get('/cat', [CategoryController::class, 'getAllCategories']);
    Route::put('/cat/{id}', [CategoryController::class, 'editCategory']);
    Route::delete('/cat/{id}', [CategoryController::class, 'deleteCategory']);

    // //API SUBCATEGORIES
    // Route::post('/subcat', [SubCategoryController::class, 'create']);
    // Route::get('/subcat/{id}', [SubCategoryController::class, 'getSubCategory']);
    // Route::get('/subcat', [SubCategoryController::class, 'getAllSubCategories']);
    // Route::put('/subcat/{id}', [SubCategoryController::class, 'editSubCategory']);
    // Route::delete('/subcat/{id}', [SubCategoryController::class, 'deleteSubCategory']);
});

Route::prefix('logging')->group(function () {
    Route::post('/performance', [ApiLogController::class, 'store']);
});

/*  ############### fe config ###################################*/
Route::prefix('/config')->group(function () {
    Route::get('/read', [JsonController::class, 'readJson']);
    Route::post('/edit', [JsonController::class, 'writeJson']);
});
