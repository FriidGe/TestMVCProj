<?php
	/**
	 * Created by PhpStorm.
	 * User: FridGe
	 * Date: 25.11.2016
	 * Time: 14:26
	 */

	class News{

		public static function getNewsItemById($id){

			$id = intval($id);

			if ($id){
				$db = Db::getConnection();

				$result = $db->query('SELECT * from news WHERE id='.$id);

				$result->setFetchMode(PDO::FETCH_ASSOC);

				$newsItem = $result->fetch();
				return $newsItem;
			}


		}

		public static function getNewsList(){

			$db = Db::getConnection();
			$newsList = [];

			$result = $db->query('SELECT id, title, date, short_content '
				. 'FROM news '
				. 'ORDER BY date DESC '
				. 'LIMIT 10 ');

			$result->setFetchMode(PDO::FETCH_ASSOC);
			while ($row = $result->fetch()){
				$newsList[] = $row;
			}
			return $newsList;
		}
	}