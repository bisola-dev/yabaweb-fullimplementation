<?php

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


Route::group(['namespace' => 'App\Http\Controllers'],function(){
    Route::apiResource('skooldeet', schservController::class);
    Route::apiResource('User', yababController::class);
    Route::get('/stat', [App\Http\Controllers\yababController::class, 'stat'])->name('stattest');

    Route::get('/basikinfo', [App\Http\Controllers\yababController::class, 'basikinfo']);
    Route::get('/acad', [App\Http\Controllers\schservController::class,'acad']);
    Route::get('/reg', [App\Http\Controllers\schservController::class,'reg']);
    Route::get('/regprofile/{id}', [App\Http\Controllers\schservController::class,'regprofile']);
    Route::get('/bur', [App\Http\Controllers\schservController::class,'bur']);

  
 
});
