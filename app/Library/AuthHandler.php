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
					if( $dd[$username]['password'] == hash('md5', $password)){
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

		private static function usrCheck($username){
			$usr_data = self::usr_data();

			$temp_data = array();

			
			foreach( $usr_data as $good ){
				foreach ($good as $key => $value) {
					// code...
					array_push($temp_data, $key);
				}
			}

			foreach($temp_data as $name ){
				if( $name == $username){
					return true;
					break;
				}else{
					return false;
					break;
				}
			}


		}

		public static function signup( $name, $username, $password ){


			if( self::usrCheck( $username ) == true ){
				return array('status'=>0, 'msg'=> $username . '. Used by another user.');
			}else{
				$usr_data = self::usr_data();

				$inp = array($username=>array("name"=>$name, "password"=>hash('md5', $password)));

				array_push( $usr_data, $inp);

				$json_data = json_encode($usr_data, JSON_PRETTY_PRINT);

				if(file_put_contents(self::$filename, $json_data)){
					return array('status'=>1,'msg'=>'Signup successfuly');
				}else{
					return array('status'=>0,'msg'=>'Signup unsuccessfuly');
				}				
			}


			

		}



		private static function usr_data(){

			$decoded = json_decode(file_get_contents(self::$filename),1);
			return $decoded;
		}

	}



?>