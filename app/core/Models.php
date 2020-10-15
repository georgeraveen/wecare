<?php
class Models{
    public function dataConnect(){
        define('DB_DRIVER', 'mysql');
        define('DB_SERVER', 'localhost');
        define('DB_SERVER_USERNAME', 'newuser');
        define('DB_SERVER_PASSWORD', 'password');
        define('DB_DATABASE', 'wecare');


        define('PROJECT_NAME', 'WeCare Life Insurance Management System');
        $dboptions = array(
                    PDO::ATTR_PERSISTENT => FALSE, 
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    );

        try {
        $DB = new PDO(DB_DRIVER.':host='.DB_SERVER.';dbname='.DB_DATABASE, DB_SERVER_USERNAME, DB_SERVER_PASSWORD , $dboptions);  
        } catch (Exception $ex) {
        echo $ex->getMessage();
        die;
        }
        return $DB;
    }
}