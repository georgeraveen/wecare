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
    public function viewFile($filePath, $ext){
        $type = $ext=="pdf" ? "application":"image";
        header("Content-type: ".$type."/".$ext);
        // var_dump($filePath);
        // var_dump($ext);
        // echo file_get_contents( '../documents/'.$filePath);
        require_once '../documents/'.$filePath;
    }
    public function checkPermission($role){
        if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
            // not logged in send to login page
            redirect("/wecare/employee");
            // redirect("./../../employee");
        }
        if($_SESSION["rolecode"]!=$role){
            die("You dont have the permission to access this page");
        }
    }
    public function permissionError(){
        die("You dont have the permission to access this page");
    }
    public function checkPermissionCust(){
        if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
            // not logged in send to login page
            // redirect("./../../customer-portal");
            redirect("/wecare/customer-portal");
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
    public function isEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('invalid Email');
        }
    }
    public function isNumber($number){
        if (!is_numeric($number)) {
            throw new Exception('invalid number');
        }
    }
    public function isName($name){
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            throw new Exception("Only letters and white space allowed");
        }
    }
}