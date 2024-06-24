<?php

use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ThemeSettingController;
use App\Http\Controllers\Backend\UserController;
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
Route::redirect('/', 'login');

Route::get('/dashboard', function () {
    return view('backend.pages.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::post('users/{id}/update/password', [UserController::class , 'updatePassword'])->name('users.update.password');
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::get('/default-theme', [ThemeSettingController::class, 'defaultTheme'])->name('default-theme');
Route::get('/dark-theme', [ThemeSettingController::class, 'darkTheme'])->name('dark-theme');
Route::get('/light-theme', [ThemeSettingController::class, 'lightTheme'])->name('light-theme');

require __DIR__.'/auth.php';
