<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Library\UserActivity;

UserActivity::getInstance();

class DashboardController extends Controller
{
    //
    public function dashboard(){
    	return view('dash_lay.main');
    }


    public function usr_activity(){
    	print_r( UserActivity::getUserActivity('toor'));
    }

    

}
