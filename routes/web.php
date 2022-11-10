<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RedirectHandlesController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[IndexController::class,'index']);
Route::post('/',[IndexController::class,'index']);
Route::get('loginadmin',[AdminAuthController::class,'index']); //login admin
Route::get('/article/{slug}',[IndexController::class,'show']);
Route::get('dashboard',[AdminAuthController::class,'dashboard']);
Route::get('login',[UserAuthController::class,'index'])->name('userlogin'); //loginuser
Route::post('login',[UserAuthController::class,'auth'])->name('userloginpost');//loginuser
Route::get('register',[UserAuthController::class,'registerindex'])->name('registerindex');
Route::post('register',[UserAuthController::class,'register'])->name('registerpost');
Route::post('loginadmin',[AdminAuthController::class,'auth'])->name('authpost'); //login admin
Route::get('/logout',[AdminAuthController::class,'signOut'])->name('signout');
Route::get('/article/{id}/delete',[ArticleController::class,'destroy']);
Route::get('/article/{id}/edit',[ArticleController::class,'edit']);
Route::put('article/{id}/update',[ArticleController::class,'update'])->name('update');
Route::get('dashboard/tambahartikel',[ArticleController::class,'index'])->name('addarticle');
Route::post('/dashboard/tambahartikel',[ArticleController::class,'create'])->name('addarticlepost');
Route::get('/dashboard/statistik',[AdminAuthController::class,'statistic'])->name('statisticindex');
Route::get('/dashboard/admin',[AdminAuthController::class,'setting'])->name('adminsetting');
Route::post('/dashboard/admin',[AdminAuthController::class,'createnewadmin'])->name('createadmin');
Route::get('/dashboard/admin/{user:slug}/details',[AdminAuthController::class,'admindetails'])->name('admindetails');
Route::get('/dashboard/imageuploader',[AdminAuthController::class,'imageuploaderview'])->name('imageuploader');
Route::post('/dashboard/imageuploader',[AdminAuthController::class,'imageuploader'])->name('imageuploaderpost');
Route::get('/dashboard/addcategory',[AdminAuthController::class,'addcategoryindex'])->name('addcategory');
Route::post('/dashboard/addcategory',[AdminAuthController::class,'addcategory'])->name('addcategorypost');
Route::get('/dashboard/usersetting',[AdminAuthController::class,'usersettingindex'])->name('usersetting');
Route::post('dashboard/usersetting',[AdminAuthController::class,'usersetting'])->name('usersettingpost');
Route::get('404',[RedirectHandlesController::class,'index']);