<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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

Route::get('/', [LoginController::class, 'login']);

Route::group(['middleware' => ['guest']], function() {
    Route::post('login-view', [LoginController::class, 'authenticate'])->name('login-view');
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('logout-view', [LoginController::class, 'logoutView'])->name('logout-view');

});
