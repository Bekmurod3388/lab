<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('api/json',[\App\Http\Controllers\Api\JsonController::class, 'index']);
Route::prefix('admin')->name('admin.')->middleware(['web', 'auth'])->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::resource('api', App\Http\Controllers\ApiController::class);

});
