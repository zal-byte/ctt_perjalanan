<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Library\AuthHandler;
use Illuminate\Support\Facades\Session;

AuthHandler::getInstance();

class AuthController extends Controller
{

    //
    public function login(){
        return view('auth_lay.login');
    }
    public function signup(){
    	return view('auth_lay.signup');
    }


    public function log_in( Request $request ){

        $nik = $request->nik;
        $name = $request->name;
        
        Session::put("nik", $nik);

        $response = AuthHandler::login( $nik, $name);

        // print_r($response);
        if( $response['status'] == 1){
            Session::put('login', true);
            Session::put('name', $name);
            echo json_encode($response);
        }else{
            echo json_encode($response);
        }

    }
    
    public function sign_up( Request $request){

        $nik = $request->nik;
        $name = $request->name;

        $response = AuthHandler::signup( $nik, $name );

        echo json_encode($response);
    }


    public static function logout(){
        Session::forget('login');
        Session::forget("nik");
        Session::forget('name');
        return redirect('/auth/login');
    }


}
