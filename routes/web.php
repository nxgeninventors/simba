<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\QuotesController;
use App\Models\Quotes;
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
    Route::resource('expense_categories', App\Http\Controllers\ExpenseCategoryController::class);
    Route::resource('expense', App\Http\Controllers\ExpenseController::class);
});

Route::post('customers/contactsave', [ClientsController::class, 'contactsave']);
Route::put('customers/contact/edit', [ClientsController::class, 'contactedit']);

Route::get('company', function () {
    return view('company.company');
});

Route::post('invoice_bill', [CompanyController::class, 'company_details']);
Route::get('invoice', [CompanyController::class, 'invoice_index']);
Route::post('invoice_save', [CompanyController::class, 'invoice_save']);
Route::post('invoice_description', [CompanyController::class, 'invoice_description']);
Route::post('details_del', [CompanyController::class, 'details_del']);

Route::post('company', [CompanyController::class, 'detailssave']);


Route::get('reports',[AccountsController::class, 'account_index']);
Route::post('reports',[AccountsController::class, 'account_index'])->name('reports.account_index');

Route::get('purchase',[PurchaseOrderController::class, 'purchase_index']);
Route::post('purchase_bill',[PurchaseOrderController::class, 'company_details']);
Route::post('purchase_save',[PurchaseOrderController::class, 'purchase_save']);
Route::post('purchase_details',[PurchaseOrderController::class, 'purchase_details']);
Route::post('purchase_details_del',[PurchaseOrderController::class, 'details_del']);

Route::get('quotes',[QuotesController::class, 'quotes_index']);
Route::post('quotes_bill',[QuotesController::class, 'company_details']);
Route::post('quotes_save',[QuotesController::class, 'quotes_save']);
Route::post('quotes_details',[QuotesController::class, 'quotes_details']);
Route::post('quotes_details_del',[QuotesController::class, 'details_del']);

require __DIR__.'/auth.php';