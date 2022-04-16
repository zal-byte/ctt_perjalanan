<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Library\UserActivity;

UserActivity::getInstance();

class DashboardController extends Controller
{
    //
   
    public function view( ){

        $name = isset($_GET['select']) ? $_GET['select'] : null;

        if(!Session::get('login'))
        {
            return redirect('/auth/login');
        }

        return view('dash_lay.view', ['activity'=>UserActivity::getUserActivity(Session::get('nik'), $name)]);
    }

    public function delete( ){
        //authentication check

        $res = UserActivity::delUserActivity( $_GET['data'] );
        print_r($res);

    }

    public function add_activity( Request $request ){

        $date = $request->date;
        $time = $request->time;
        $location = $request->location;
        $temperature = $request->temperature;
        $information = $request->information;


        $response = UserActivity::addUserActivity(Session::get('nik'), $date, $time, $location, $temperature, $information );

        echo json_encode( $response );

    }

    

}
