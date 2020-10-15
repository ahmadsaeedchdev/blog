<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;


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

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::group(['middleware' => ['permission:write_articles']], function () {
    //
    Route::resource('/post', PostController::class);
});


Route::group(['middleware' => ['permission:delete_articles']], function () {
    //
    Route::resource('/roles', RoleController::class)->except(['show', 'edit', 'update']);
    Route::resource('/permissions', PermissionController::class)->only('index');
    Route::get('/see.permissions', [RoleController::class, 'viewPermissions']);
});
