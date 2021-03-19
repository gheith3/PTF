<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
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

Route::get('/test', function () {

});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['middleware' => ['guest']], function (){
    Route::get('auth/pin/confirm/{token}', [AuthController::class, "confirmPin"])
        ->name('auth.pin.confirm');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('admin/places', function () {
        return view('admin.places');
    })->name('admin.places.control');

});


