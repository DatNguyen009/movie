<?php 
    class App{
        protected $controllers = "Skincare";
        protected $action = "Home";
        protected $params = [];
        function __construct()
        {
           $arr = $this->urlProcess();
           
           //Xu li controller
            if (file_exists("./MVC/controllers/" .$arr[0].".php")) {
                $this->controllers = $arr[0];
                unset($arr[0]);
            }

            require_once "./MVC/controllers/" .$this->controllers.".php";
            $this->controllers = new $this->controllers;
            //Xu li action
            if (isset($arr[1])) {
                if (method_exists($this->controllers, $arr[1])) {
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            //xu li params
            $this->params = $arr?array_values($arr):[];
            call_user_func_array([$this->controllers,$this->action],$this->params);
         
        }

        function urlProcess(){
            if (isset($_GET["url"])) {
                return explode("/", filter_var(trim($_GET["url"],"/")) ); 
            }
        }

       
    }

?>