<?php

	namespace App\Library;
	use Illuminate\Support\Facades\Session;

	class UserActivity{
		private static $instance = null;
		public static function getInstance(){
			if( self::$instance == null ){
				self::$instance = new UserActivity();
			}
			return self::$instance;
		}

		private static $filename = null;

		private static $res = array();
		private static function checkUserActivity( $nik ){
			self::$filename = storage_path("usr_activity_" . $nik . ".txt");
			if(!file_exists(self::$filename)){
				file_put_contents(self::$filename, '');
			}
		}

		public static function getUserActivity( $nik, $sortby ){

			self::checkUserActivity( $nik );

			$data = self::usr_activity();

			if( $data != null ){
				$temp_data = array();
				$i = 0;
				foreach( $data as $val ){
					$temp_data[$i]=array();
					foreach( explode("|", $val) as $go){
						array_push( $temp_data[$i], $go);
					}
					$i++;
				}
			}else{
				$temp_data = null;
			}



			return $temp_data;

		}

		public static function addUserActivity( $nik, $date, $time, $location, $temperature, $information ){

			self::checkUserActivity( $nik );

			$format = $date . "|" . $time . "|" . $location . "|" . $temperature . "|" . $information . "\n";

			$file = fopen(self::$filename, 'a+');

			if( fwrite( $file, $format) ){
				return array('status'=>1,'msg'=>'Catatan berhasil ditambahkan');
			}else{
				return array('status'=>0, 'msg'=>'Gagal menambahkan catatan');
			}
			fclose($file);

		}

		private static function usr_activity(){
			$txt = trim(file_get_contents(self::$filename));
			if( strlen($txt) > 0 ){
				$data = explode("\n", $txt);
			}else{
				$data = null;
			}
			return $data;
		}
	}

?>