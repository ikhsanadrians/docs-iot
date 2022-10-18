<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ArticleController;
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
Route::get('login',[AdminAuthController::class,'index']);
Route::get('/article/{slug}',[IndexController::class,'show']);
Route::get('dashboard',[AdminAuthController::class,'dashboard']);
Route::post('login',[AdminAuthController::class,'auth'])->name('authpost');
Route::get('/logout',[AdminAuthController::class,'signOut'])->name('signout');
Route::get('/article/{id}/delete',[ArticleController::class,'destroy']);
Route::get('/article/{id}/edit',[ArticleController::class,'edit']);
Route::put('article/{id}/update',[ArticleController::class,'update'])->name('update');
Route::get('dashboard/tambahartikel',[ArticleController::class,'index'])->name('addarticle');
Route::post('/dashboard/tambahartikel',[ArticleController::class,'create'])->name('addarticlepost');
Route::get('/dashboard/statistik',[AdminAuthController::class,'statistic'])->name('statisticindex');
Route::get('/dashboard/admin',[AdminAuthController::class,'setting'])->name('adminsetting');
Route::post('/dashboard/admin',[AdminAuthController::class,'createnewadmin'])->name('createadmin');