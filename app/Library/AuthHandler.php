<?php

	namespace App\Library;

	class AuthHandler{
		private static $instance = null;
		public static function getInstance(){
			if( self::$instance == null ){
				self::$instance = new AuthHandler();
			}
			return self::$instance;
		}

		private static $filename = null;

		public function __construct(){
			self::$filename = storage_path('config.txt');
		}

		public static function login( $nik, $name ){
			$data = self::getConfig();

			if( in_array($nik, self::getNik($data))){
				if( in_array($name, self::getName($data))){
					//login successfuly
					return array('status'=>1);
				}else{
					return array('status'=>0, 'msg'=>'Nama salah');
					//invalid name
				}
			}else{
				return array('status'=>0,'msg'=>'NIK tidak ditemukan');
				//user not found
			}

		}

		private static function getNik($data){
			$temp_nik = array();
			foreach($data as $val ){
				array_push($temp_nik,explode('|', $val)[0]);
			}
			return $temp_nik;
		}

		private static function getName( $data ){
			$temp_name = array();
			foreach($data as $val){
				array_push($temp_name, explode('|', $val)[1]);
			}
			return $temp_name;
		}

		public static function signup( $nik, $name ){
			$file = fopen(self::$filename, 'a+');

			$data = self::getConfig();

			$format = $nik . "|" . $name . "\n";


			if(is_numeric($nik) ){
					if( in_array($nik, self::getNik($data))){
						//user already exists
						return array('status'=>0,'msg'=>'NIK ini telah terdaftar.');
					}else{
						//continue
						if( fwrite($file, $format) ){
							return array('status'=>1,'msg'=>'Daftar berhasil');
						}else{
							return array('status'=>0,'msg'=>'Gagal daftar');
						}
						fclose($file);
					}	
			}else{
				return array('status'=>0, 'msg'=>'NIK yang kamu masukan bukan angka');
			}


		}

		private static function getConfig(){
			$data = file_get_contents(self::$filename);

			return explode("\n", trim($data));

		}
	}
?>