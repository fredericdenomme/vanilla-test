<?php

use App\Http\Controllers\StorageController;
use App\Http\Controllers\WidgetController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// VANILLA STORAGE SERVICE
Route::any('/storage/get', [StorageController::class, 'get']);
Route::any('/storage/put', [StorageController::class, 'put']);

// VANILLA RESTFUL API
Route::resource('widgets', WidgetController::class)->middleware(['auth.bearer.token', 'x.day.header']);
