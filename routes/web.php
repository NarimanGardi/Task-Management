<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\GroupController;

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
Route::redirect('/', 'login');

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::post('users/{id}/update/password', [UserController::class , 'updatePassword'])->name('users.update.password');
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('groups', GroupController::class);

require __DIR__.'/auth.php';
