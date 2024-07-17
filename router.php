<?php
    class Router{
        private $controller;
        private $method;

        public function __construct()
        {
            $this->matchRoute();

        }
        public function matchRoute(){
            //var_dump(URL);
            //explode va a separar una cadena de texto por un separador
            $url = explode('/',URL);
            //var_dump($url);
            $this->controller = !empty($url[1]) ? $url[1] : 'Home';
            $this->method = !empty($url[2]) ? $url[2] : 'index';

            $this->controller = $this->controller .'controller';
            require_once(__DIR__ .'../Controlador/'.$this->controller.'.php');

        }
        public function run(){
            $controller = new $this->controller();
            $method = $this->method;
            $controller->$method();
    }
}

$router = new Router


  



?>