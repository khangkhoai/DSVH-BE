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
use App\Models\HoatDong;

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
Route::post('search2/',[DiSanController::class,'search2']);
Route::get('ss',[DiSanController::class,'showss']);
Route::get('viewest',[DiSanController::class,'view']);
Route::get('detail/{id}',[DiSanController::class,'detail']);
Route::resource('loaidisan',LoaiDiSanController::class);
Route::get('loaidisan/get/{id}',[LoaiDiSanController::class,'getDetails']);
Route::resource('capdisan',CapDiSanController::class);
Route::get('capdisan/get/{id}',[CapDiSanController::class,'getDetails']);
Route::resource('hoatdong',HoatDongController::class);
Route::post('hoatdong/{hoatdong}',[HoatDongController::class,'updateHoatDong']);
Route::get('hoatdong/newest/',[HoatDongController::class,'search']);
Route::post('searchTime',[HoatDongController::class,'search2']);
Route::get('newest/',[HoatDongController::class,'newest']);
Route::resource('danhgia',DanhGiaController::class);
Route::get('vote/{id}',[DanhGiaController::class,'vote']);
Route::get('stat/',[DanhGiaController::class,'stat']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    
});

