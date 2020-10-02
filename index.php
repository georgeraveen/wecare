<?php
require_once("./config/config.php");

if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
    // if logged in send to dashboard page
    if($_SESSION["rolecode"] =='DEO'){
        redirect("./dataEntry/dataEntryHome.php");
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

                if($_SESSION["rolecode"] =='DEO'){
                    redirect("./dataEntry/dataEntryHome.php");
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
redirect("index.php");
}
?>
<div>
    <form method="post" action="">
    <input type="hidden" name="mode" value="login" >
    <fieldset>
        <label>Username:</label>
        <input type="text" value="" placeholder="User Name" id="username" name="username" required="" >
        <label>Password:</label>
        <input type="password" value="" placeholder="Password" id="user_password" name="user_password" required="" >
        <button type="submit">Submit</button> 
    </fieldset>

    </form>
</div>