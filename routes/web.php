<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Models\Registration;
use App\Http\Controllers\RegisterManagementController;
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

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pendaftaran/create', [RegistrationController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran/store', [RegistrationController::class, 'store'])->name('pendaftaran.store');
Route::get('/pendaftaran/sukses', [RegistrationController::class, 'sukses'])->name('pendaftaran.sukses');
Route::get('/manage/pendaftaran', [RegisterManagementController::class, 'index'])->name('manage.register.index');
