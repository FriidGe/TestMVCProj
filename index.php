<?php
	/**
	 * Created by PhpStorm.
	 * User: FridGe
	 * Date: 25.11.2016
	 * Time: 12:25
	 */
	//Общие настройки
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	//Подключение файлов системы
	define('ROOT', dirname(__FILE__));
	require_once (ROOT.'/components/Router.php');
	require_once 'components/Db.php';
	include_once ROOT.'/models/Login.php';

	// Установка соединения с БД


	//Подключение Router
	session_start();
	$router = new Router();
	$router ->run();
