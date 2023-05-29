<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SupplierController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\Partner;
use App\Models\Supplier;

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

    Route::get('/odashboard', function() {
        return Inertia::render('OperatorDashboard');
    });

    Route::post('/logout');

    // Partner requests
    Route::get('/new-partner', [PartnerController::class, 'create'])->middleware('can:partner-one')->name('newPartner');
    Route::post('/new-partner', [PartnerController::class, 'store'])->middleware('can:partner-one');
    Route::delete('/partners/{id}', [PartnerController::class, 'destroy'])->middleware('can:partner-one')->name('deletePartner')->middleware('can:partner-one');

    // json for list
    Route::get('/partners', function() {
        $partners = Partner::all();
        return response()->json($partners);
    });

    // Supplier requests
    Route::get('/new-supplier', [SupplierController::class, 'create']);
    Route::post('/new-supplier', [SupplierController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
