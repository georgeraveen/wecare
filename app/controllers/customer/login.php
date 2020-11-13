<?php

class Login extends Controller{

    public function index(){
        if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
            // if logged in send to dashboard page
            if($_SESSION["rolecode"] =='CUST'){
                redirect("./../../customer-portal/customerHome");
            }
            
        }
        $this->view('customer/index');
    }
    public function autho(){
        // var_dump($_POST);
        // var_dump($_REQUEST["mode"]);

        require './../app/config/config.php';
        // var_dump($DB);
        if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
            // if logged in send to dashboard page
            if($_SESSION["rolecode"] =='CUST'){
                redirect("./../customer-portal/customerHome");
            }
            
        }
        $mode = $_REQUEST["mode"];
        if ($mode == "login") {
            $username1 = trim($_POST['username']);
            $pass = trim($_POST['user_password']);
            $userType = str_split($username1,4)[0];
            
            $username = str_split($username1,4)[1];
            // echo "s".$username;
            if($userType != "CUST"){
                redirect("./../../customer-portal");
            }
            // echo "here";
            if ($username == "" || $pass == "") {

                $_SESSION["errorType"] = "danger";
                $_SESSION["errorMsg"] = "Enter manadatory fields";
            }
            
            else {
                // $sql = "SELECT * FROM customer WHERE custID = :uname AND password = :upass ";
                $sql2 = "SELECT custID,custName,hashPass FROM customer WHERE custID = :uname";

                // echo "db";
                // var_dump($DB);
                try {
                    $stmt = $DB->prepare($sql2);
                    // echo "s";
                    // bind the values
                    $stmt->bindValue(":uname", $username);
                    // $stmt->bindValue(":upass", $pass);

                    // execute Query
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    // echo $username1." ".$username;
                    // print_r($results);
                    // if (count($results) > 0) {
                    if (password_verify($pass,$results[0]["hashPass"])) {
                        $_SESSION["errorType"] = "success";
                        $_SESSION["errorMsg"] = "You have successfully logged in.";

                        $_SESSION["user_id"] = $username;
                        $_SESSION["rolecode"] = "CUST";
                        $_SESSION["username"] = $username;
                        $_SESSION["custName"] = $results[0]["custName"];
                        // echo "success";
                        redirect("./../../customer-portal/customerHome");

                        exit;
                    } else {
                        // echo "fail";
                        $_SESSION["errorType"] = "info";
                        $_SESSION["errorMsg"] = "username or password does not exist.";
                    }
                } catch (Exception $ex) {

                    $_SESSION["errorType"] = "danger";
                    $_SESSION["errorMsg"] = $ex->getMessage();
                }
            }
        redirect("./../../customer-portal");
        }
    }

    public function logout(){
        
        session_start();
        if($_SESSION["rolecode"] =='CUST'){
            $_SESSION = array();
            unset($_SESSION);
            session_destroy();
            redirect("./../../customer-portal/login");
            // header("location:customer-portal");
        }
        else{
            $_SESSION = array();
            unset($_SESSION);
            session_destroy();
            // header("location:index.php");
            redirect("./../../employee/login");
        }

        exit;
    }
}