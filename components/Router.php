<?php
	/**
	 * Created by PhpStorm.
	 * User: FridGe
	 * Date: 25.11.2016
	 * Time: 12:27
	 */
	class Router{

		private $routes;

		public function __construct()
		{
			$routesPath = ROOT.'/config/routes.php';
			$this->routes = include($routesPath);
		}

		private function getURI()
		{
			if (!empty($_SERVER['REQUEST_URI'])){
				 return trim($_SERVER['REQUEST_URI'], '/');
			}
		}

		public function run()
		{
			//Получить строку запроса
			$uri = $this->getURI();

			//Проверить наличие такого запроса в routes
			foreach ($this->routes as $uriPattern => $path) {

				//Сравниваем $uriPattern в нашем $uri
				if (preg_match("~$uriPattern~", $uri)){

					//Получаем внутренний путь из внешнего согласно правилу
					$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
					//Определить какой контроллер
					//и action обрабатывают запрос
					$segments = explode('/', $internalRoute);    //Разбиваем нашу строку $path на массив

					$contollerName = ucfirst(array_shift($segments).'Controller'); //Получаем имя контроллера и Приводит написание контроллера с большой буквы
					//Тоже самое для экщенов
					$actionName = 'action'.ucfirst(array_shift($segments));

					$parameters = $segments;

					//подключить файл класса-контроллера
					$contollerFile = ROOT.'/controllers/'.$contollerName.'.php';

					if (file_exists($contollerFile)){
						include_once ($contollerFile);
					}
					//Создать объект, вызвать метод
					$contollerObject = new $contollerName;

					$result = call_user_func_array(array($contollerObject, $actionName), $parameters);
					if ($result != null){
						break;
					}
				}
			}





		}
	}