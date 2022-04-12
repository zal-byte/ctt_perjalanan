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
					if( $usr_data['user'][$num]['password'] == $password){
						return array('status'=> true, 'user'=> $usr_data['user'][$num]);
					}else{
						return array('status'=>false);
					}
				}else{
					echo 'user not found';
				}
			}

		}



		private static function usr_data(){

			$decoded = json_decode(file_get_contents(self::$filename),1);
			return $decoded;
		}

	}



?>