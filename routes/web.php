<?php

use App\Http\Controllers\CustomFieldController;
use App\Http\Controllers\FormController;
use App\Http\NavigationController;
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
auth()->loginUsingId(1);
Route::get('/', function () {
    return view('app');
});

Route::get('admin/form-create',[NavigationController::class, 'formCreate']);
Route::get('admin/form-submit',[NavigationController::class, 'formSubmit']);

Route::resource('admin/form', FormController::class);
Route::resource('admin/custom-Fields', CustomFieldController::class);
