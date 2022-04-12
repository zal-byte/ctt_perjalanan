<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/signup',[AuthController::class, 'signup'])->name('signup');

Route::post('/auth/login_post', [AuthController::class, 'log_in']);
Route::post('/auth/signup_post', [AuthController::class, 'sign_up']);
