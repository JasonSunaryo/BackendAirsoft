<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockLogController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\ReportController;

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

Route::get('/', [ProductController::class, 'menu'])->name('product.menu');

Route::get('/index', function () {
    return view('index');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/main', function () {
        return view('main');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::resource('/product', ProductController::class);
Route::post('/product/increase/{id}', [ProductController::class, 'increaseStock'])->name('product.increase');
Route::post('/product/decrease/{id}', [ProductController::class, 'decreaseStock'])->name('product.decrease');
Route::get('/product/increase/{id}', [ProductController::class, 'increaseStock'])->name('product.increaseStock');
Route::get('/product/decrease/{id}', [ProductController::class, 'decreaseStock'])->name('product.decreaseStock');

Route::get('/history', [StockLogController::class, 'index'])->name('history');
Route::get('/profit', [ProfitController::class, 'index'])->name('profit.index');
Route::delete('/stocklogs/clear', [ProductController::class, 'clearStockLogs'])->name('stocklogs.clear');


Route::resource('reports', ReportController::class);
Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');
Route::post('/reports/store', [ReportController::class, 'store'])->name('reports.store');
Route::get('/reports/{id}/edit', [ReportController::class, 'edit'])->name('reports.edit');
Route::put('/reports/{id}', [ReportController::class, 'update'])->name('reports.update');
Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');
Route::get('reports/{id}/detail', 'ReportController@detail')->name('reports.detail');
