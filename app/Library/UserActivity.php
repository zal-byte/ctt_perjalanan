<?php

	namespace App\Library;

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
			self::$filename = storage_path('usr_activity.json');
		}

		public static function getUserActivity( $username ){

			$user_data = self::usr_activity();
			self::$res['usr_activity'] = array();
			$i = 0;
			foreach( $user_data as $data ){
				if(isset($data[$username])){
					$re['no'] = $data[$username][$i]['no'];
					$re['date'] = $data[$username][$i]['date'];
					$re['location'] = $data[$username][$i]['location'];
					$re['information'] = $data[$username][$i]['information'];
					array_push(self::$res['usr_activity'], $re);

					break;					
					$i++;
				}
			}

			return self::$res;


		}

		private static function usr_activity(){
			$decoded = json_decode(file_get_contents(self::$filename), 1);
			return $decoded;
		}
	}

?>