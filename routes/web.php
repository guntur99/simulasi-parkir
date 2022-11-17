<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkirController;

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
})->name('welcome');

Route::get('/parkir/check-in', [ParkirController::class, 'checkIn'])->name('parkir.check-in');
Route::post('/parkir/chek-in/store', [ParkirController::class, 'store'])->name('parkir.check-in.store');
Route::get('/parkir/check-out', [ParkirController::class, 'checkOut'])->name('parkir.check-out');
Route::post('/parkir/check-out/cari', [ParkirController::class, 'cariKendaraan'])->name('parkir.check-out.cari');
Route::put('/parkir/check-out/update/{id}', [ParkirController::class, 'update'])->name('parkir.check-out.update');
Route::get('/parkir/report', [ParkirController::class, 'report'])->name('parkir.report');
