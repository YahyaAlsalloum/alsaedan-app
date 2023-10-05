<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlogController;
use App\Http\Controllers\RealEstateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//  plog
Route::post('plogs/{plog}', [PlogController::class, 'update']);
Route::resource('plogs', PlogController::class);

//  RealEstate
Route::post('RealEstates/{RealEstate}', [RealEstateController::class, 'update']);
Route::resource('RealEstates', RealEstateController::class);

