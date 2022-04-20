<?php

	namespace App\Library;
	use Illuminate\Support\Facades\Session;
	use Illuminate\Support\Facades\Crypt;

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



		public static function identifier(){
			Session::put('identifier', Session::get('nik') ."_".uniqid());
		}

		public static function get_identifier(){
			return Session::get('identifier');
		}

		public static function getUserActivity( $nik, $sortby ){

			self::checkUserActivity( $nik );

			$data = self::usr_activity();

			if( $data != null ){
				$temp_data = array();
				$i = 0;
				foreach( $data as $val ){
					if($val != null ){
						$temp_data[$i]=array();
						foreach( explode("|", $val) as $go){
							array_push( $temp_data[$i], $go);
						}
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

			self::identifier();

			$identifier = self::get_identifier();

			$data = file_get_contents(self::$filename);

			if( $data != null ){
				$data = Crypt::decrypt( $data );
			}


			$format = $date . "|" . $time . "|" . $location . "|" . $temperature . "|" . $information . "|" . $identifier ."{{%}}";

			$final = Crypt::encrypt( $data . $format );

			if( file_put_contents(self::$filename, $final)){
				return array('status'=>1,'msg'=>'Catatan berhasil ditambahkan');
			}else{
				return array('status'=>0,'msg'=>'Gagal menambahkan catatan');
			}

		}

		public static function getUserActivityIden( $identifier ){
			$data = self::usr_activity();
			
			$temp_data = array();

			foreach( $data as $v){
				if( $v != null ){
					$id = explode('|', $v)[5];
					$temp_data[$id] = array();

					array_push($temp_data[$id], $v);
				}
			}
		}

		public static function delUserActivity($param){
			self::checkUserActivity( Session::get('nik'));
			$d = self::usr_activity();

			$temp_data= array();


			//key->val to temp_data
			foreach( $d as $v){
				if( $v != null ){
					$id = explode('|', $v)[5];
					$temp_data[$id] = array();

					array_push($temp_data[$id], $v);
				}
			}

			//check
			foreach($temp_data as $key=>$val){
				if(  $key == $param ){
					unset($temp_data[$param]);
					break;
				}
			}

			//write

			$ars = array();

			foreach($temp_data as $key=>$val){
				array_push($ars, $val);
			}

			$file = fopen(self::$filename, 'w+');
			foreach($ars as $get){
				fwrite($file, $get[0] . "{{%}}");
			}
			fclose($file);

			return true;
		}

		public static function update_activity( $previous_activity, $new_activity, $nik ){
			self::checkUserActivity( $nik );
	
			$raw_data = file_get_contents(self::$filename);
			$file = fopen(self::$filename, 'w+');
			
			$updated = str_replace( $previous_activity, $new_activity, $raw_data);
			if( fwrite( $file, $updated)){
				return array('status'=>1);
			}else{
				return array('status'=>0,'msg'=>'Gagal memperbarui aktifitas');
			}
		}

		private static function usr_activity(){
			$txt = file_get_contents(self::$filename);
			if( strlen($txt) > 0 ){
				$txt = Crypt::decrypt( $txt );
				$data = explode("{{%}}", $txt);
			}else{
				$data = null;
			}
			return $data;
		}
	}

?>