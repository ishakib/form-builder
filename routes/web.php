<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\FromSubmissionController;
use App\Http\NavigationController;
use App\Models\User;
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
if ($user = User::find(1)) {
    auth()->login($user);
}

Route::get('/', function () {
    return view('app');
});

//Navigation
Route::get('admin/form-create', [NavigationController::class, 'formCreate']);
Route::get('admin/form-list', [NavigationController::class, 'formList']);
Route::get('admin/form-submit', [NavigationController::class, 'formSubmit']);


Route::get('{slug}', [NavigationController::class, 'viewForm']);

Route::post('admin/form', [FormController::class, 'store']);
Route::post('form/submission', [FormController::class, 'storeSubmission']);
