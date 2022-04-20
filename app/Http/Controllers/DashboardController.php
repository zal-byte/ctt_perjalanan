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
        return view('dash_lay.update', ['identifier'=>$data->identifier,'nik'=>$data->nik,'date'=>$data->date, 'time'=>$data->time, 'location'=>$data->location, 'temperature'=>$data->temperature,'information'=>$data->information]);
    }

    public function update_post( Request $request ){
        
        $previous_activity = $request->previous_activity;
        
        $date = $request->date;
        $time = $request->time;
        $location = $request->location;
        $temperature = $request->temperature;
        $information = $request->information;
        $identifier = $request->identifier;
        
        $nik = $request->nik;


        $new_activity = $date . "|" . $time . "|" . $location . "|" . $temperature . "|" . $information . "|" . $identifier. "{{%}}";

        $response= UserActivity::update_activity($previous_activity, $new_activity, $nik);
        
        if( $response['status'] ==1 ){
            return redirect(route('main_view'));
        }else{
            return back()->withErrors([$response['msg']]);
        }
 
    }   



    

}
