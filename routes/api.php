<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\PembeliController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/mobil/get-single/{mobil}', [MobilController::class, 'data_single']);
Route::get('/pembeli/get-single/{pembeli}', [PembeliController::class, 'data_single']);
