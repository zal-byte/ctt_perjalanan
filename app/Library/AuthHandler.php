<?php

	namespace App\Library;
	class AuthHandler{
		private static $instance = null;
		public static function getInstance(){
			if(self::$instance == null){
				self::$instance = new AuthHandler();
			}
			return self::$instance;
		}

		private static $filename = null;

		public function __construct(){
			self::$filename = storage_path('usr_data.json');
		}
	
		public static function login( $username, $password ){

			$usr_data = self::usr_data();

			for( $num = 0; $num < count($usr_data);$num++){
				if( $usr_data['user'][$num]['username'] == $username ){
					if( $usr_data['user'][$num]['password'] == md5($password)){
						return array('status'=> true, 'user'=> $usr_data['user'][$num]);
					}else{
						return array('status'=>false, 'msg'=>'invalid password');
					}
				}else{
					return array('status'=>false, 'msg'=>'user not found');
				}
			}

		}

		public static function signup( $name, $username, $password ){


			$usr_data = self::usr_data();

			$inp = array("username"=>$username, "name"=>$name, "password"=>md5($password));

			array_push( $usr_data['user'], $inp);

			$json_data = json_encode($usr_data, JSON_PRETTY_PRINT);

			if(file_put_contents(self::$filename, $json_data)){
				return array('status'=>true,'msg'=>'Signup successfuly');
			}else{
				return array('status'=>false,'msg'=>'Signup unsuccessfuly');
			}
			

		}



		private static function usr_data(){

			$decoded = json_decode(file_get_contents(self::$filename),1);
			return $decoded;
		}

	}



?>