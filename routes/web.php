<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockLogController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

// Public route to display products and comments
Route::get('/', [ProductController::class, 'menu'])->name('product.menu');

Route::get('/profile', function () {
    return view('profile');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/main', function () {
        return view('main');
    });

    Route::get('/index', function () {
        return view('index');
    });

    // Comment routes accessible to authenticated users
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Authentication routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin-only routes
Route::group(['middleware' => ['auth', 'admin']], function () {
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
});
