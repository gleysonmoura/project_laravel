<?php

use App\Http\Controllers\ImageProcessingController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return view('welcome');
});

    Route::get('/get-invoice', 'App\Http\Controllers\InvoiceController');
    Route::get('/process-qr-code', 'App\Http\Controllers\ImageProcessingController');


//Route::get('/get-invoice', [InvoiceController::class, '__invoke']);

