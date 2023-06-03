<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\RakibController;
use App\Http\Controllers\backend\BrandimageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//product
Route::get('/addproduct',[ProductController::class,"index"])->name("addproduct");
Route::get('/showproduct',[ProductController::class,"show"])->name("showproduct");
Route::post('/insertproduct',[ProductController::class,"insert"])->name("insertproduct");
Route::get('/activeproduct/{id}',[ProductController::class,"active"])->name("activeproduct");
Route::get('/inactiveproduct/{id}',[ProductController::class,"inactive"])->name("inactiveproduct");
Route::get('/deleteproduct/{id}',[ProductController::class,"delete"])->name("deleteproduct");
Route::get('/editproduct/{id}',[ProductController::class,"edit"])->name("editproduct");
Route::post('/updateproduct/{id}',[ProductController::class,"update"])->name("updateproduct");
//Category
Route::get('/addcategory',[CategoryController::class,"index"])->name("addcategory");      
Route::post('/storecategory',[CategoryController::class,"store"])->name("storecategory");
Route::get('/showcategory',[CategoryController::class,"show"])->name("showcategory");
Route::get('/activecategory/{id}',[CategoryController::class,"active"])->name("activecategory");
Route::get('/inactivecategory/{id}',[CategoryController::class,"inactive"])->name("inactivecategory");
Route::get('/editcategory/{id}',[CategoryController::class,"edit"])->name("editcategory");
Route::post('/updatecategory/{id}',[CategoryController::class,"update"])->name("updatecategory");
Route::get('/destrycategory/{id}',[CategoryController::class,"destry"])->name("destrycategory");

//brand
Route::get('/addbrand',[BrandController::class,'index'])->name('addbrand');
Route::post('/storebrand',[BrandController::class,'store']);
Route::get('/showbrand',[BrandController::class,'show']);
Route::get('/activebrand/{id}',[BrandController::class,'active']);
Route::get('/inactivebrand/{id}',[BrandController::class,'inactive']);
Route::get('/destroybrand/{id}',[BrandController::class,'destroy']);
Route::get('/editbrand/{id}',[BrandController::class,'edit']);
Route::post('/updatebrand/{id}',[BrandController::class,'update']);

//brand image
Route::get('/addbrandimg',[BrandimageController::class,'index'])->name("addbrandimg");
Route::post('/storebrandimg',[BrandimageController::class,'store'])->name("storebrandimg");
Route::get('/showbrandimg',[BrandimageController::class,'show'])->name("showbrandimg");
Route::get('/viewgallery/{id}',[BrandimageController::class,'view'])->name("viewgallery");
//Rakib
Route::get('/addrakib',[RakibController::class,'index'])->name('addrakib');
Route::post('/storerakib',[RakibController::class,'store']);
Route::get('/showrakib',[RakibController::class,'show']);
Route::get('/activerakib/{id}',[RakibController::class,'active']);
Route::get('/inactiverakib/{id}',[RakibController::class,'inactive']);
Route::get('/deleterakib/{id}',[RakibController::class,'delete']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
