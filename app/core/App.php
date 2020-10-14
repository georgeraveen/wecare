<?php
class App{

    protected $controller = 'login'; //root controller

    protected $method = 'index'; //root method

    protected $params = [];
    public function __construct(){
        // echo 'OK';
        // print_r($this->parseUrl());
        $url = $this->parseUrl(); //split the url
        // print_r($url);
        //goto the relavent controller
        // echo $url[0]."..".$url[1]."..".$url[2]."..";
        // echo $_SESSION["portal"];
        // echo $this->controller;
        if(file_exists('../app/controllers/'.$_SESSION["portal"].'/' . $url[0] . '.php')){
            $this->controller = $url[0];
            // unset($url[0]);
        }
        require_once '../app/controllers/'.$_SESSION["portal"].'/' . $this->controller . '.php';
        // echo $this->controller;
        $this->controller=new $this->controller;
        // var_dump($this->controller);

        //goto the relavent method
        if(!isset($url[0])){
            redirect("./login/index");
        }
        // var_dump($url[1]);
        // if($url[1]==null){
        //     redirect("./../".$url[0]."/index");
        // }
        if(isset($url[1])){
           if(method_exists($this->controller, $url[1])){
                // echo 'OK';
                $this->method =  $url[1];
                unset($url[1]);
            }
        }
        else{
            // var_dump($url[0]);
            redirect("./".$url[0]."/index");
        }
        unset($url[0]);
        // print_r($url);
        $this->params = $url ? array_values($url) : [];
        // print_r($this->params);
        call_user_func_array([$this->controller,$this->method],$this->params);
    }
    public function parseUrl(){
        // var_dump($_GET);
        // var_dump($_POST);
        if(isset($_GET['url'])){
            // echo $_GET['url'];
            return $url = explode('/', filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));

        }
        
    }
}