<?php
require_once("./../config/config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("./../index.php");
}
 if($_SESSION["rolecode"]!="DOC"){
    die("You dont have the permission to access this page");
 }



 include './../header.php';

 
?>

<link rel="stylesheet" href= "./../css/home.css">
<link rel="stylesheet" href= "./../css/style.css">

<div class="containers">
    <h1>Review And Comments</h1><br>
</div>