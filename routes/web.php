<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PriceLogsController;
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

Route::get('/', [DemoController::class, 'index']);
Route::get('/autocomplete', [DemoController::class, 'autocomplete'])->name('autocomplete');
// Route::get('/sum', [DemoController::class, 'total'])->name('sum');
Route::post('/add', [DemoController::class,'store']);
Route::get('item/view', [DemoController::class, 'show'])->name('items.show');
Route::get('/save', [DemoController::class,'updateQuan'])->name('save');
Route::get('/unit', [UnitController::class, 'storeUnits']);
Route::post('/add-quantity', [DemoController::class,'updateQuan']);
Route::post('/add-price', [DemoController::class,'updatePrice']);
Route::post('/pre-price', [PriceLogsController::class,'store']);
Route::get('price/logview', [PriceLogsController::class, 'show'])->name('pricelogs.show');
Route::post('/del-log', [PriceLogsController::class,'deleteLog']);
