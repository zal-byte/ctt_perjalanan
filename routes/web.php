<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/auth/login', function(){
	if( Session::get('login') ){
		return redirect('/main/dashboard');
	}
	return view('auth_lay.login');
})->name('login');

Route::get('/auth/signup',[AuthController::class, 'signup'])->name('signup');

Route::post('/auth/login_post', [AuthController::class, 'log_in'])->name('login_post');
Route::post('/auth/signup_post', [AuthController::class, 'sign_up'])->name('signup_post');

Route::get('/main/dashboard', function(){
	if( !Session::get('login')){
		return redirect('/auth/login');
	}
	return view('dash_lay.main');
})->name('main_dashboard');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
