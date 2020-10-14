<?php
if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
  // not logged in send to login page
  redirect("./../index.php");
}
if($_SESSION["rolecode"]!="CUST"){
  die("You dont have the permission to access this page");
}

// var_dump($data);
?>

<!-- <link rel="stylesheet" href= "./../css/home.css">   -->
<link rel="stylesheet" href= "./../../css/custStyle.css">
<link rel="stylesheet" href= "./../../css/custStyle2.css">
<link rel="stylesheet" href= "./../../css/modal.css">

<img src="./../../images/undraw_progress_data_4ebj.svg" class="img-background img-right">
<div class="containers">

  <h1>View My Insurance Claim Cases</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>ID</th>
        <th>Discharge Date</th>
        <th>Status</th>
        <th>Hospital</th>
        <th>Claim Amount</th>
        <th>Feedback</th>
      </tr>
      <?php
      foreach($data as $row){
        echo "<tr>"."<td>".$row['claimID']."</td>".
              "<td>".$row['dischargeDate']."</td>".
              "<td>".$row['claimID']."</td>".
              "<td>".$row['name']."</td>".
              "<td>".$row['payableAmount']."</td>".
              "<td> <a class=\"editBtn\" href=\"#\" onClick=\"openFeedback(".$row['claimID'].")\">Add</a> "."</td> </tr>".
              " <textarea id=\"custFeedbackBox-".$row['claimID']."\" name=\"custFeedback\" hidden class=\"commentBox hide\">dadsadsa</textarea>"." ";
      }

      ?>
    </table>
    
  </div>
</div>
<div id="Modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="#" method="get">
      
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="custFeedback">Feedback</label><br>
            <textarea id="custFeedback" name="custFeedback" class="commentBox"></textarea> <br>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="column">
          <div class="formInput">
            <input type="submit" id="addFeedback" name="addFeedback" class="btn-submit" value="Add Feedback"><br>
            <input hidden type="number" id="claimIDD" name="claimID" value=9><br>
          </div>
        </div>
      </div>
    </form>
  </div>

</div>
<script src="./../../js/modal.js"></script>