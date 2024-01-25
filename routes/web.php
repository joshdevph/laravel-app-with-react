<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinanceDataController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // COMPANY PROFILE
    Route::get('/company-profile', [FinanceDataController::class, 'indexPage'])->name('finance.index');
    Route::post('/company-profile', [FinanceDataController::class, 'searchCompanyProfile'])->name('finance.search');

    // COMPANY QUOTE
    Route::get('/company-quote', [FinanceDataController::class, 'quotePage'])->name('finance.quote');
    Route::post('/company-quote', [FinanceDataController::class, 'searchCompanyQuote'])->name('finance.searchquote');
});

require __DIR__.'/auth.php';
