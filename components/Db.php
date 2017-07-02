<?php
	/**
	 * Created by PhpStorm.
	 * User: FridGe
	 * Date: 25.11.2016
	 * Time: 15:12
	 */
	class Db{
		public static function getConnection(){
			$paramsPath = ROOT.'/config/db_params.php';
			$params = include ($paramsPath);

			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

			return $db;
		}
	}
