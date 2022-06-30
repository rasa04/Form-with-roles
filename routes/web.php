<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ManagerController;
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

Route::get('/', [FormController::class, 'form'])->name('form');
Route::post('/store', [FormController::class, 'store'])->name('form.create');

Route::resource('manager', ManagerController::class);

Auth::routes();
