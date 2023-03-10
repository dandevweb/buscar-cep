<?php

use App\Http\Livewire\SearchZipcode;
use Illuminate\Support\Facades\Route;

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

Route::get('/', SearchZipcode::class)->name('search-zipcode');

Route::get('/index', [App\Http\Controllers\PdfController::class, 'index']);
Route::get('/export-pdf', [App\Http\Controllers\PdfController::class, 'exportPdf']);
