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
Route::group(['prefix'=>'tickets'],function(){
    Route::get('/',array('uses'=>'TicketsController@index'));
    Route::post('/create',array('uses'=>'TicketsController@create'));
    Route::post('/move',array('uses'=>'TicketsController@move'));
    Route::delete('/delete',array('uses'=>'TicketsController@delete'));
});
