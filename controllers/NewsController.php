<?php
	/**
	 * Created by PhpStorm.
	 * User: FridGe
	 * Date: 25.11.2016
	 * Time: 13:20
	 */
	include_once ROOT.'/models/News.php';
	include_once ROOT.'/models/Login.php';

	class NewsController{

		public function actionIndex()
		{
			$newsList = array();
			$newsList = News::getNewsList();
			//require_once (ROOT.'/views/news/index.html');
			return true;
		}

		public function actionView($id)
		{
			$newsItem = News::getNewsItemById($id);
			if (Login::checkUser($_SESSION["login"], $_SESSION["password"])) {
				echo '<pre>';
				print_r($newsItem);
				echo '<pre>';
			} else {
				header("Location: http://localhost/login");
			}
			return true;
		}
	}