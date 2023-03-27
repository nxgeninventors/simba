<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
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

//Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/customers', function () {
//     return view('customers');
// })->middleware(['auth', 'verified'])->name('customers');

Route::get('/projects', function () {
    return view('customers');
})->middleware(['auth', 'verified'])->name('projects');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('meeting-notes', App\Http\Controllers\MeetingNoteController::class);
    Route::resource('customers', App\Http\Controllers\ClientsController::class);
    Route::resource('projects', App\Http\Controllers\ProjectController::class);
    Route::resource('income', App\Http\Controllers\IncomeController::class);
    Route::resource('expense', App\Http\Controllers\ExpenseController::class);
});

Route::get('/Customers/save', ClientsController::class)->name('contactsave');

require __DIR__.'/auth.php';
