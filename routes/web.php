<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SystemController;

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

Route::get('/',[NewsController::class, 'indexAction']);
Route::get('/news',[NewsController::class, 'getListAction']);
Route::get('/news/search',[NewsController::class, 'searchAction']);
Route::get('/news/searchtitle',[NewsController::class, 'searchTitleAction']);
Route::get('/system/cronWorkImitation',[SystemController::class, 'cronWorkImitation']);
