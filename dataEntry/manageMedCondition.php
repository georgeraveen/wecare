<?php
require_once("./../config/config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
  // not logged in send to login page
  redirect("./../index.php");
}
if($_SESSION["rolecode"]!="DEO"){
  die("You dont have the permission to access this page");
}

include './../header.php';
include './../classes/employee.php';
include './../classes/hospital.php';
include './../classes/customer.php';

$employee= new Employee($DB);
$hospital= new Hospital($DB);
$customer= new Customer($DB);

?>

<link rel="stylesheet" href= "./../css/home.css">
<link rel="stylesheet" href= "./../css/style.css">
<div class="containers">
  <h1>Manage Medical Condition</h1><br>
  <div class="form-container2">
    <form >
      <div class="row">
        <div class="column">
          <select id="custID" name="custID" required>
            <option>1 - nimal</option>
            <option>2 - wimal</option>
          </select><br>
        </div>
        <div class="column">
          <div class="formInput">
            <!-- <input type="submit" id="addMed" name="addMed" class="btn-submit" value="Add New"><br> -->
            <a class="btn-submit" href="./addMedCondition.php">Add New</a>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <!-- <input type="submit" id="viewMed" name="viewMed" class="btn-submit" value="View"><br> -->
            <a class="btn-submit" href="./viewMedCondition.php">View / Update</a>
          </div>
        </div>
      </div>
    </form>
  </div>
  <br><br>

  
</div>

<?php

// var_dump($meds);
include './../footer.php';
?>