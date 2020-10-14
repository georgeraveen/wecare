<?php
//     include './../app/config/config.php';
// var_dump($DB);
class Controller{
    
    
    public function model($model){
        // echo $model;
        require_once '../app/models/' . $model . '.php';
        // return new $model($DB);
    }

    public function view($view, $data = []){
        require_once '../app/views/'.$view. '.php';
    }
}