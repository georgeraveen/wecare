<?php
require_once("./config/config.php");

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
    // if logged in send to dashboard page
    if($_SESSION["rolecode"] =='CUST'){
        redirect("./customer/customerHome.php");
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
        redirect("customer.php");
    }

    if ($username == "" || $pass == "") {

        $_SESSION["errorType"] = "danger";
        $_SESSION["errorMsg"] = "Enter manadatory fields";
    }
    else {
        $sql = "SELECT * FROM customer WHERE custID = :uname AND password = :upass ";
        // echo "s";
        try {
            $stmt = $DB->prepare($sql);
            // echo "s";
            // bind the values
            $stmt->bindValue(":uname", $username);
            $stmt->bindValue(":upass", $pass);

            // execute Query
            $stmt->execute();
            $results = $stmt->fetchAll();
            // echo $username1." ".$username;
            // print_r($results);
            if (count($results) > 0) {
                $_SESSION["errorType"] = "success";
                $_SESSION["errorMsg"] = "You have successfully logged in.";

                $_SESSION["user_id"] = $username;
                $_SESSION["rolecode"] = "CUST";
                $_SESSION["username"] = $username;
                $_SESSION["custName"] = $results[0]["custName"];
                // echo "s";
                redirect("./customer/customerHome.php");

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
redirect("customer.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
</head>

<body>
    <img class="login-background" src="images/undraw_medicine_b1ol.svg">
    <div class="container">

        <div class="login-container">
            <form method="post" action="./customer.php">
                <input type="hidden" name="mode" value="login" >
                <img class="avatar" src="images/undraw_Login_re_4vu2.svg">
                <h2>WeCare Customer Web Portal</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" type="text" value=""  id="username" name="username" required="" >
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" value=""  id="user_password" name="user_password" required="" >
                    </div>
                </div>
                <a href="#">Forgot Password ?</a>
                <input type="submit" class="btn-submit" value="Login">
            </form>

        </div>
        <div class="img">

        </div>
    </div>
    <script type="text/javascript" src="./js/login.js"></script>
</body>

</html>