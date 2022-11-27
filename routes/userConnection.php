<?php

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

Route::post('/suggestions', [App\Http\Controllers\UserConnectionsController::class, 'index'])->name('suggestions');
Route::post('/createrequest', [App\Http\Controllers\UserConnectionsController::class, 'store'])->name('createRequest');
Route::post('/sentrequests', [App\Http\Controllers\UserConnectionsController::class, 'index'])->name('sentRequests');
Route::post('/recievedrequests', [App\Http\Controllers\UserConnectionsController::class, 'index'])->name('recievedRequests');
Route::post('/deleterequest', [App\Http\Controllers\UserConnectionsController::class, 'destroy'])->name('deleteRequest');
