<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('teams', TeamController::class)->only('index','store');
    Route::put('teams/{team:slug}', [TeamController::class, 'update'])->name('teams.update');
    Route::get('teams/{team:slug}', [TeamController::class, 'show'])->name('teams.show');
    Route::delete('teams/{team:slug}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['guest']], function() {
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

