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
		private static $res = array();

		public function __construct(){
			self::$filename = storage_path('usr_data.json');
		}
	
		public static function login( $username, $password ){
	
			$usr_data = self::usr_data();

			$i = 0;
			foreach( $usr_data as $dd ){

				if( array_key_exists($username, $dd)){
					if( $dd[$username]['password'] == $password){
						return array('status'=>1);
						break;
					}else{
						return array('status'=>0, 'msg'=>'invalid password');
						break;
					}
				}
				$i++;
			}

			if( $i == count($usr_data)){
				return array('status'=>0, 'msg'=>'user not found');
			}

		}

		public static function signup( $name, $username, $password ){


			$usr_data = self::usr_data();

			$inp = array($username=>array("name"=>$name, "password"=>$password));

			array_push( $usr_data, $inp);

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