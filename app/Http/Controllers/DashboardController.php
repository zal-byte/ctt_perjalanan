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

    public function delete( $data ){
        //authentication check

        $res = UserActivity::delUserActivity( $data );

        if( $res == true){
            return redirect()->route('main_view');
        }

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

    public function update_form( Request $data ){
        return view('dash_lay.update', ['identifier'=>$data->identifier,'nik'=>$data->nik]);
    }

    public function update_post( Request $request ){
           $identifier = $request->identifier;
        $date = $request->date;
        $time = $request->time;
        $location = $request->location;
        $temperature = $request->temperature;
        $information = $request->information;
        $nik = $request->nik;

        $response = UserActivity::update_activity( $identifier, $date, $time, $location, $temperature, $information, $nik );
        
        echo "<pre>";
        print_r( $response );
        echo "</pre>";
 
    }   



    

}
