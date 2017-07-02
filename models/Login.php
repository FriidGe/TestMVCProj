<?php

	/**
	 * Created by PhpStorm.
	 * User: FridGe
	 * Date: 12.12.2016
	 * Time: 22:03
	 */
	class Login
	{
		public static function checkUser ($login, $password){
			$db = Db::getConnection();
			$result = $db->query("SELECT * from `users` WHERE `login` = '$login' AND `password` = '$password'");
			$result->setFetchMode(PDO::FETCH_ASSOC);
			if ($result->fetch()){
				return true;
			} else {
				return false;
			}
		}
	}