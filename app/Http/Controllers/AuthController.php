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

        $username = $request->username;
        $password = $request->password;

        $response = AuthHandler::login( $username, $password);


        if( $response['status'] == 1){
            Session::put('login', true);
            Session::put("username", $username);

            echo json_encode($response);
        }else{
            echo json_encode($response);
        }

    }
    
    public function sign_up( Request $request){

        $username = $request->username;
        $password = $request->password;
        $name = $request->name;

        $response = AuthHandler::signup( $name, $username, $password);

        if( $response['status'] ){
            echo json_encode($response);
        }
    }


    public function logout(){
        Session::forget('login');
        Session::forget("username");
        return redirect('/auth/login');
    }


}
