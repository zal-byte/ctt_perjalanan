<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class DashboardController extends Controller
{
    //
    public function dashboard(){
    	return view('dash_lay.main');
    }


    public function logout(){
    	Session::forget('login');
    	return redirect('/auth/login');
    }
}
