<?php


$result=$data;
// var_dump($result);

?>

<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<div class="containers">
  <ul class="breadcrumb">
    <li><a href="./../dataEntryHome/index">Home</a></li>
    <li><a href="./../promotions/index">Manage Promotions</a></li>
    <li>View Promotions</li>
  </ul>
  <h1>View Promotions</h1><br>
  <a href="./addPromo" class="editBtn" >Add New Promotion</a>
  <br>
  <br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Type</th>
        <th>Image</th>
        <th colspan="2">Action</th>
      </tr>
      <?php
      foreach($result as $row){
        echo "<tr>"."<td>".$row['id']."</td>".
              "<td id=\"date-".$row['id']."\">".$row['date']."</td>".
              "<td id=\"type-".$row['id']."\">".$row['type']."</td>".
              "<td id=\"image-".$row['id']."\"><img class=\"thumb\" src=\"./../../documents/promo/".$row['image']."\"/></td>".
              "<td> <a class=\"deleteBtn\" href=\"./deletePromo?action=delPromo&id=".$row['id']."\">Delete</a></td>"."</tr>";
      }

      ?>
    </table>
    
  </div>
</div>

<script src="./../../js/modal.js"></script>