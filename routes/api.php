<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiSanController;
use App\Http\Controllers\LoaiDiSanController;
use App\Http\Controllers\CapDiSanController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\DiaChiController;
use App\Http\Controllers\HoatDongController;
use App\Http\Controllers\AuthController;
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
Route::middleware('auth:api')->group(function (){
    Route::get('user', [AuthController::class,'user']);
    Route::get('logout', [AuthController::class,'logout']);
   
});

Route::resource('disan',DiSanController::class);
Route::post('disan/{disan}',[DiSanController::class,'updateDiSan']);
Route::get('disan/search/{name}',[DiSanController::class,'search']);
Route::resource('loaidisan',LoaiDiSanController::class);
Route::resource('capdisan',CapDiSanController::class);
Route::resource('hoatdong',HoatDongController::class);
Route::resource('danhgia',DanhGiaController::class);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    
});

