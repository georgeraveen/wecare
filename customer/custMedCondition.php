<?php
require_once("./../config/config.php");
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
  // not logged in send to login page
  redirect("./../index.php");
}
if($_SESSION["rolecode"]!="CUST"){
  die("You dont have the permission to access this page");
}
include './../header.php';
include './../classes/customer.php';

$customer= new Customer($DB);

$result = array (
  array("recordID"=>"1","date"=>"2020-08-01","type"=>"a","healthCondition"=>"22","comments"=>"18"),
  array("recordID"=>"2","date"=>"2020-08-02","type"=>"b","healthCondition"=>"15","comments"=>"13"),
  array("recordID"=>"3","date"=>"2020-08-03","type"=>"c","healthCondition"=>"5","comments"=>"2"),
  array("recordID"=>"4","date"=>"2020-08-04","type"=>"d","healthCondition"=>"17","comments"=>"15")
);

?>

<!-- <link rel="stylesheet" href= "./../css/home.css"> -->
<link rel="stylesheet" href= "./../css/custStyle.css">
<link rel="stylesheet" href= "./../css/custStyle2.css">
<link rel="stylesheet" href= "./../css/modal.css">
<img src="./../images/undraw_medical_research_qg4d.svg" class="img-background img-left">
<div class="containersMed">
  <h1>View Medical Condition</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Record ID</th>
        <th>Date</th>
        <th>Type</th>
        <th colspan="1">Action</th>
      </tr>
      <?php
      foreach($result as $row){
        echo "<tr>"."<td>".$row['recordID']."</td>".
              "<td id=\"date-".$row['recordID']."\">".$row['date']."</td>".
              "<td id=\"type-".$row['recordID']."\">".$row['type']."</td>".
              "<td hidden id=\"healthCondition-".$row['recordID']."\">".$row['healthCondition']."</td>".
              "<td><a onclick=\"clickViewMed(".$row['recordID'].")\" class=\"editBtn\" href=\"#".$row['recordID']."\">View </a> "."</td>"."</tr>";
      }

      ?>
    </table>
    
  </div>
</div>
<div id="Modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="./back/backend.php" method="post">
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="medDate">Date</label><br>
            <input type="Date" id="medDate" name="medDate" class="input" value="2020-08-01" required><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="type">Type</label><br>
            <select id="type" name="type" required>
              <option value=a>a</option>
              <option value=b>b</option>
              <option value=c>c</option>
              <option value=d>d</option>
            </select><br>
          </div>
          
        </div>
      </div>
     
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="healthCondition">Health Condition</label><br>
            <textarea id="healthCondition" name="healthCondition" class="commentBox"></textarea> <br>
          </div>
        </div>
      </div> 
      
    </form>
  </div>

</div>
<script src="./../js/modal.js"></script>
<?php

// var_dump($meds);
include './../footer.php';
?>