<?php
require_once("./../config/config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
  // not logged in send to login page
  redirect("./../index.php");
}
if($_SESSION["rolecode"]!="MED"){
  die("You dont have the permission to access this page");
}

?>

<?php
include './../header.php';
?>
<link rel="stylesheet" href= "./../css/home.css">
<link rel="stylesheet" href= "./../css/style.css">
<div class="containers">
  <h1>Scrutinizer Completed queue</h1>
  <h2>Please select the date range</h2>
  <label for="birthday">From:</label>
  <input type="date" id="fromDate" name="From">
  <label for="birthday">To:</label>
  <input type="date" id="toDate" name="To">
  <input type="submit" value="Select">



  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Claim ID</th>
        <th>Customer Name</th>
        <th>Mobile No.</th>
        <th>Type</th>
        <th>Date of admission</th>
        <th>Hospital</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Mr.Perera</td>
        <td>0771231231</td>
        <td>VIP</td>
        <td>2020/10/02</td>
        <td>Navaloka</td>
        <td>Completed</td>
        <td>Review Case</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Mr.Dammika</td>
        <td>02463244</td>
        <td>Regular</td>
        <td>2020/12/02</td>
        <td>Durdens</td>
        <td>Completed</td>
        <td>Review Case</td>
      </tr>

 
    </table>
    
  </div>
</div>