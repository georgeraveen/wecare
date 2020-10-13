<?php

session_start();
if($_SESSION["rolecode"] =='CUST'){
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header("location:customer.php");
}
else{
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header("location:index.php");
}

exit;
?>
