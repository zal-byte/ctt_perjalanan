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

    public function add_activity( Request $request ){

        $date = $request->date;
        $time = $request->time;
        $location = $request->location;
        $temperature = $request->temperature;
        $information = $request->information;

        $response = UserActivity::addUserActivity( $date, $time, $location, $temperature, $information );

        echo json_encode( $response );

    }

    

}
