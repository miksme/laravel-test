<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authenticate;

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



Route::post('/authenticate', [Authenticate::class, 'login']);
Route::middleware(['auth:api'])->group(function(){
    Route::get('/logout', [Authenticate::class, 'logout']);
    Route::get('/me', [Authenticate::class, 'me']);
    Route::resource('/users', UserController::class);
});