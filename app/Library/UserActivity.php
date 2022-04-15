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

		public function __construct(){
			self::$filename = storage_path('usr_activity_' . Session::get("nik") . '.txt');
		}

		public static function getUserActivity( $nik ){

			$user_data = self::usr_activity();
			self::$res['usr_activity'] = array();
			$i = 0;
			foreach( $user_data as $data ){
				if(isset($data[$nik])){
					$re['date'] = $data[$nik][$i]['date'];
					$re['time'] = $data[$nik][$i]['time'];
					$re['location'] = $data[$nik][$i]['location'];
					$re['temperature'] = $data[$nik][$i]['temperature'];
					$re['information'] = $data[$nik][$i]['information'];
					array_push(self::$res['usr_activity'], $re);

					break;					
					$i++;
				}
			}

			return self::$res;


		}

		public static function addUserActivity( $date, $time, $location, $temperature, $information ){

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
			$decoded = json_decode(file_get_contents(self::$filename), 1);
			return $decoded;
		}
	}

?>