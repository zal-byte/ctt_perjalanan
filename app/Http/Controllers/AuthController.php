<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Library\AuthHandler;

AuthHandler::getInstance();

class AuthController extends Controller
{

    //
    public function login(){

    	print_r(AuthHandler::login('admin','admin'));

        return view('auth_lay.login');
    }
    public function signup(){
    	return view('auth_lay.signup');
    }


    public function log_in( Request $request ){
    	print_r($request);
    }
    
    public function sign_up( Request $request){
      print_r( $request);
    }


}
