<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function() {
    Route::get('/', [ViewController::class, 'dashboard'])->name('overview');
    Route::resource('users', UserController::class);
});