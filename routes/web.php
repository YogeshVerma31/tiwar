<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KycController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [AuthController::class, 'index_login'])->name('auth.loginView');
    Route::post('/login', [AuthController::class, 'post_login'])->name('login');

    // Register
    Route::get('/register', [AuthController::class, 'registerView'])->name('auth.registerView');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['prefix' => 'admin', 'middleware' => ['customAuth']], function () {

    Route::get('dashboard', [DashboardController::class, 'index_admin'])->name('dashboard');

    Route::get('/', [DashboardController::class, 'index_admin'])->name('dashboard');

    Route::get('add-category', [CategoryController::class, 'index_add_category'])->name('view-add-category');
    Route::post('add-category', [CategoryController::class, 'post_add_category'])->name('post-add-category');

    Route::get('view-category', [CategoryController::class, 'index_view_category'])->name('view-category');

    Route::get('add-subcategory', [SubCategoryController::class, 'index_add_subcategory'])->name('view-add-subcategory');
    Route::post('add-subcategory', [SubCategoryController::class, 'post_add_subcategory'])->name('post-add-subcategory');

    Route::get('view-subcategory', [SubCategoryController::class, 'index_view_subcategory'])->name('view-subcategory');

    Route::get('add-kyc', [KycController::class, 'index_add_kyc'])->name('view-add-kyc');
    Route::post('add-kyc', [KycController::class, 'post_add_kyc'])->name('post-add-kyc');

    Route::get('view-kyc', [KycController::class, 'index_view_kyc'])->name('view-kyc');

    Route::get('getCities/{id}', [KycController::class, 'get_city_by_state']);

    Route::get('add-user', [UserController::class, 'index_add_user'])->name('view-add-user');
    Route::post('add-user', [UserController::class, 'post_add_user'])->name('post-add-user');

    Route::get('view-user', [UserController::class, 'index_view_user'])->name('view-user');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

});
