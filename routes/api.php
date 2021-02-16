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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::middleware('auth:api')->get('/', function (Request $request) {
//    return $request->news();
//});
Route::get('/', 'NewsController@getList');
Route::get('/news/search', 'NewsController@searchAction');
//Route::get('/news/getList', 'NewsController@getList');
//Route::group(['prefix' => 'post'], function () {
//    Route::resource('getList', 'NewsController@getList');
//    Route::get('search/{id}', 'NewsController@search');
//});
