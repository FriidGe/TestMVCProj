<?php

	/**
	 * Created by PhpStorm.
	 * User: FridGe
	 * Date: 12.12.2016
	 * Time: 22:02
	 */
	include_once ROOT.'/models/Login.php';

	class LoginController
	{
		public function actionIndex()
		{
			require_once ROOT.'/views/login.html';
			$login = $_POST['login'];
			$password = $_POST['password'];
			$users = Login::checkUser($login, $password);
			if ($users){
				$_SESSION["login"] = $login;
				$_SESSION["password"] = $password;
			} else {
				$_SESSION["error_auth"] = 1;
			}
			if ($_POST["logout"]) {
				unset($_SESSION["login"]);
				unset($_SESSION["password"]);
				unset($_SESSION["error_auth"]);
			}
			return true;
		}
	}