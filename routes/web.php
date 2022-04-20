<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Library\UserActivity;
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

Route::get('', function(){
	if(!Session::get('login')){
		return redirect('/auth/login');
	}
	return redirect('/main/view');
});

Route::get('/auth/login', function(){
	if( Session::get('login') ){
		return redirect('/main/view');
	}
	return view('auth');
})->name('auth');


Route::post('/auth/login_post', [AuthController::class, 'log_in'])->name('login_post');
Route::post('/auth/signup_post', [AuthController::class, 'sign_up'])->name('signup_post');
Route::post('/add/usr_activity', [DashboardController::class, 'add_activity'])->name('add_activity');
Route::post('/update', [DashboardController::class, 'update_post'])->name('update_activity');


Route::get('/update/activity/{identifier}/{nik}/{date}/{time}/{location}/{temperature}/{information}', [DashboardController::class, 'update_form']);

Route::get('/main/welcome', function(){
	if( !Session::get('login')){
		return redirect('/auth/login');
	}
	return view('dash_lay.welcome');
})->name('main_welcome');

Route::get('/main/view', [DashboardController::class, 'view'])->name('main_view');
Route::get('/del/data/{data}', [DashboardController::class, 'delete']);

Route::get('/main/add', function(){
	if(!Session::get('login')){
		return redirect('/auth/login');
	}
	return view('dash_lay.add');
})->name('main_add');

Route::get('/logout', function(){
	if( Session::get('login')){
		AuthController::logout();
	}
	return redirect('/auth/login');
})->name('logout');

