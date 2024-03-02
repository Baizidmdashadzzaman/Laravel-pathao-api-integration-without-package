<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PathaoApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/city-list', [PathaoApiController::class, 'city_list'])->name('city.list');
Route::get('/zone-list/{city_id}/{city_name}', [PathaoApiController::class, 'zone_list'])->name('zone.list');
Route::get('/area-list/{zone_id}/{zone_name}/{city_id}/{city_name}', [PathaoApiController::class, 'area_list'])->name('area.list');

Route::get('/', function () {
    return view('welcome');
});
