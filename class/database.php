<?php
	require(__DIR__.'/../config/config.php'); 
	class DB{
		private static $connection;
		private static function getConnection(){
			try {
				if(!isset(self::$connection))
				self::$connection=new PDO("mysql:host=".DB_HOST."; dbname=".DB_NAME,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			} catch (PDOException $e) {
				$e -> getMessage();
			}
			return self::$connection;
		}
		public static function prepare($sql){
			return self::getConnection()->prepare($sql);
		}
	}
