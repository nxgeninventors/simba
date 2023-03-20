<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/*
Route::middleware(['auth:api', 'verified'])->group(function(){
    Route::resource('meeting-notes', App\Http\Controllers\Api\MeetingNotesController::class);
});
*/

Route::resource('meeting-notes', App\Http\Controllers\Api\MeetingNotesController::class);
Route::resource('projects', App\Http\Controllers\Api\ProjectsController::class);
Route::resource('income', App\Http\Controllers\Api\IncomesController::class);
Route::resource('expense', App\Http\Controllers\Api\ExpensesController::class);