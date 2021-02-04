<?php


// // Our password.. the kind of thing and idiot would have on his luggage:
// $password_plaintext = "asd";

// // Hash it up, fuzzball!
// $password_hash = password_hash( $password_plaintext, PASSWORD_DEFAULT, [ 'cost' => 11 ] );

// // What do we get?
// print_r(  $password_hash );

class Login extends Controller{

    public function index(){
        if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
            // if logged in send to dashboard page
            
            if($_SESSION["rolecode"] =='DEO'){
                redirect("./../../dataEntry/dataEntryHome");
            }
            else if($_SESSION["rolecode"] =='FAG'){
                redirect("./../../fieldAgent/fieldAgHome");
            }
            else if($_SESSION["rolecode"] =='DOC'){
                redirect("./../../doctor/doctorHome");
            }
            else if($_SESSION["rolecode"] =='MGR'){
                redirect("./../../manager/managerHome");
            }
            else if($_SESSION["rolecode"] =='MED'){
                redirect("./../../medScru/medScruHome");
            }
            
        }
        $this->view('employee/index');
    }
    public function autho(){
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
                $_SESSION["portal"]="fieldAgent";
                redirect("./../../fieldAgent/fieldAgHome");
            }
            else if($_SESSION["rolecode"] =='DOC'){
                $_SESSION["portal"]="doctor";
                redirect("./../../doctor/doctorHome");
            }
            else if($_SESSION["rolecode"] =='MGR'){
                $_SESSION["portal"]="manager";
                redirect("./../../manager/managerHome");
            }
            else if($_SESSION["rolecode"] =='MED'){
                $_SESSION["portal"]="medScru";
                redirect("./../../medScru/medScruHome");
            }
            
        }
        $mode = $_REQUEST["mode"];
        if ($mode == "login") {
            $username1 = trim($this->valValidate($_POST['username']));
            $pass = trim($this->valValidate($_POST['user_password']));
            $userType = str_split($username1,3)[0];
            
            $username = str_split($username1,3)[1];
            if(!is_numeric($username)){
                $_SESSION["errorType"] = "info";
                $_SESSION["errorMsg"] = "username or password does not exist.";
                echo "<script>alert('".$_SESSION['errorMsg']."');</script>";
                $_SESSION["errorMsg"] = "";
            }
            // echo "s".$username." ".$userType;
            // var_dump(str_split($username1,3));
            // echo "here";
            else if ($username == "" || $pass == "") {
                $_SESSION["errorType"] = "danger";
                $_SESSION["errorMsg"] = "Enter manadatory fields";
            }
            
            else {
                // $sql = "SELECT * FROM employee WHERE empID = :uname AND password = :upass ";
                $sql2 = "SELECT empID,hashPass,empFirstName,empLastName,empTypeID FROM employee WHERE empID = :uname";
                try {
                    $stmt = $DB->prepare($sql2);
        
                    // bind the values
                    $stmt->bindValue(":uname", $username);
                    // $stmt->bindValue(":upass", $pass);
        
                    // execute Query
                    $stmt->execute();
                    $results = $stmt->fetchAll();
                    // echo $username1." ".$username;
                    // print_r($results);
                    if (password_verify($pass,$results[0]["hashPass"]) && $results[0]["empTypeID"]==$userType) {
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
                            $_SESSION["portal"]="fieldAgent";
                            redirect("./../../fieldAgent/fieldAgHome");
                        }
                        else if($_SESSION["rolecode"] =='DOC'){
                            $_SESSION["portal"]="doctor";
                            redirect("./../../doctor/doctorHome");
                        }
                        else if($_SESSION["rolecode"] =='MGR'){
                            $_SESSION["portal"]="manager";
                            redirect("./../../manager/managerHome");
                        }
                        else if($_SESSION["rolecode"] =='MED'){
                            $_SESSION["portal"]="medScru";
                            redirect("./../../medScru/medScruHome");
                        }
        
                        exit;
                    } else {
                        $_SESSION["errorType"] = "info";
                        $_SESSION["errorMsg"] = "username or password does not exist.";
                        echo "<script>alert('".$_SESSION['errorMsg']."');</script>";
                        $_SESSION["errorMsg"] = "";

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