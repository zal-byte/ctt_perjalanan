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


        if( $response['status'] == true){
            Session::put('login', true);
            echo json_encode($response);
        }else{
            echo json_encode($response);
        }

    }
    
    public function sign_up( Request $request){

        $username = $request->username;
        $password = $request->password;
        $name = $request->name;

        AuthHandler::signup( $name, $username, $password);
    }


    public function logout(){
        Session::forget('login');
        return redirect('/auth/login');
    }


}
