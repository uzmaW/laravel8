<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes(['verify' => true]);




Route::group(['middleware' => ['role:superadmin','admin']], function() {

    Route::get('/admin',[App\Http\Controllers\Admin\AdminController::class, 'index']); 
    Route::get('/permissions', 'App\Http\Controllers\Admin\PermissionsController@Permission');
 
 });
 
Route::group(['middleware' => ['role:user']], function() {

    Route::get('/pages', 'App\Http\Controllers\Admin\PagesController@index');
     
 });
 
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::get('/about', [App\Http\Controllers\HomeController::class, 'index'])->name('about');


Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*')->middleware('auth');
