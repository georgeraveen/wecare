<?php
require_once("./../config/config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
  // not logged in send to login page
  redirect("./../index.php");
}
if($_SESSION["rolecode"]!="MGR"){
  die("You dont have the permission to access this page");
}
include './../header.php';
?>

<link rel="stylesheet" href= "./../css/home.css">
<link rel="stylesheet" href= "./../css/style.css">
<div class="containers">
  <h1>View Reports</h1><br>
    <div class="form-container">
      <h2>Review cases and feedback</h2>
    
      <div class="row">
        <div class="column">
            <div class="formInput">
              <label for="fromDate">From date</label><br>
              <input type="Date" id="fromDate" name="fromDate" class="input" value=""><br>
            </div>
        </div>
        <div class="column">
            <div class="formInput">
              <label for="toDate">To date</label><br>
              <input type="Date" id="toDate" name="toDate" class="input" value=""><br>
            </div>
        </div>
        <div class="column">
            <div class="formInput">
              <label for="type">Type</label><br>
              <input type="Date" id="dischargeDate" name="dischargeDate" class="input" value=""><br>
            </div>
        </div>
      </div>
    </div>
</div>