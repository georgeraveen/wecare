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
    public function checkPermission($role){
        if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
            // not logged in send to login page
            redirect("./../../employee");
        }
        if($_SESSION["rolecode"]!=$role){
            die("You dont have the permission to access this page");
        }
    }
    public function checkPermissionCust(){
        if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
            // not logged in send to login page
            redirect("./../../customer-portal");
        }
        if($_SESSION["rolecode"]!="CUST"){
            die("You dont have the permission to access this page");
        }
    }
    public function valValidate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}