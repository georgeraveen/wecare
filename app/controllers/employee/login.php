<?php

class Login extends Controller{

    public function index(){
        if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
            // if logged in send to dashboard page
            
            if($_SESSION["rolecode"] =='DEO'){
                redirect("./../../dataEntry/dataEntryHome");
            }
            else if($_SESSION["rolecode"] =='FAG'){
                redirect("./fieldAgent/fieldAgHome.php");
            }
            else if($_SESSION["rolecode"] =='DOC'){
                redirect("./doctor/doctorHome.php");
            }
            else if($_SESSION["rolecode"] =='MGR'){
                redirect("./manager/managerHome.php");
            }
            else if($_SESSION["rolecode"] =='MED'){
                redirect("./medScru/medScruHome.php");
            }
            
        }
        $this->view('employee/index');
    }
    public function autho(){
        // var_dump($_POST);
        // var_dump($_REQUEST["mode"]);

        require './../app/config/config.php';
        // var_dump($DB);
        if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
            // if logged in send to dashboard page
            
            if($_SESSION["rolecode"] =='DEO'){
                $_SESSION["portal"]="dataEntry";
                redirect("./../../dataEntry/dataEntryHome");
            }
            else if($_SESSION["rolecode"] =='FAG'){
                redirect("./fieldAgent/fieldAgHome.php");
            }
            else if($_SESSION["rolecode"] =='DOC'){
                redirect("./doctor/doctorHome.php");
            }
            else if($_SESSION["rolecode"] =='MGR'){
                redirect("./manager/managerHome.php");
            }
            else if($_SESSION["rolecode"] =='MED'){
                redirect("./medScru/medScruHome.php");
            }
            
        }
        $mode = $_REQUEST["mode"];
        if ($mode == "login") {
            $username1 = trim($_POST['username']);
            $pass = trim($_POST['user_password']);
            $userType = str_split($username1,3)[0];
            
            $username = str_split($username1,3)[1];
            // echo "s".$username;
            
            // echo "here";
            if ($username == "" || $pass == "") {
                $_SESSION["errorType"] = "danger";
                $_SESSION["errorMsg"] = "Enter manadatory fields";
            }
            
            else {
                $sql = "SELECT * FROM employee WHERE empID = :uname AND password = :upass ";
                try {
                    $stmt = $DB->prepare($sql);
        
                    // bind the values
                    $stmt->bindValue(":uname", $username);
                    $stmt->bindValue(":upass", $pass);
        
                    // execute Query
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    // echo $username1." ".$username;
                    // print_r($results);
                    if (count($results) > 0 && $results[0]["empTypeID"]==$userType) {
                        $_SESSION["errorType"] = "success";
                        $_SESSION["errorMsg"] = "You have successfully logged in.";
        
                        $_SESSION["user_id"] = $username;
                        $_SESSION["rolecode"] = $userType;
                        $_SESSION["username"] = $username;
                        $_SESSION["fName"] = $results[0]["empFirstName"];
                        $_SESSION["lName"] = $results[0]["empLastName"];
                        // echo "s";
                        if($_SESSION["rolecode"] =='DEO'){
                            $_SESSION["portal"]="dataEntry";

                            redirect("./../../dataEntry/dataEntryHome");

                        }
                        else if($_SESSION["rolecode"] =='FAG'){
                            redirect("./fieldAgent/fieldAgHome.php");
                        }
                        else if($_SESSION["rolecode"] =='DOC'){
                            redirect("./doctor/doctorHome.php");
                        }
                        else if($_SESSION["rolecode"] =='MGR'){
                            redirect("./manager/managerHome.php");
                        }
                        else if($_SESSION["rolecode"] =='MED'){
                            redirect("./medScru/medScruHome.php");
                        }
        
                        exit;
                    } else {
                        $_SESSION["errorType"] = "info";
                        $_SESSION["errorMsg"] = "username or password does not exist.";
                    }
                } catch (Exception $ex) {
        
                    $_SESSION["errorType"] = "danger";
                    $_SESSION["errorMsg"] = $ex->getMessage();
                }
            }
        redirect("./../../employee");
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