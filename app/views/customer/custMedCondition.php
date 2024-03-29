<?php
//var_dump($data);
//$result = array (

  //array("recordID"=>"1","date"=>"2020-08-01","type"=>"Accidental","healthCondition"=>"Broken leg","comments"=>""),
 // array("recordID"=>"2","date"=>"2020-08-02","type"=>"Accidental","healthCondition"=>"Brain damage","comments"=>""),
 // array("recordID"=>"3","date"=>"2020-08-03","type"=>"Congenital","healthCondition"=>"Heart disease","comments"=>""),
 // array("recordID"=>"4","date"=>"2020-08-04","type"=>"Genetical","healthCondition"=>"High gloucose","comments"=>"")

//);


?>

<!-- <link rel="stylesheet" href= "./../css/home.css"> -->
<link rel="stylesheet" href= "./../../css/custStyle.css">
<link rel="stylesheet" href= "./../../css/custStyle2.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<img src="./../../images/undraw_medical_research_qg4d.svg" class="img-background img-left">
<div class="containersMed">
<ul class="breadcrumb">
    <li><a href="./../customerHome/index">Home</a></li>
    
    </ul>
  <h1>View Medical History</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Record ID</th>
        <th>Date</th>
        <th>Type</th>
        <th colspan="1">Action</th>
      </tr>
      <?php
      foreach($data as $row){
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
    <form action="#" method="post">
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="medDate">Date</label><br>
            <input type="Date" id="medDate" name="medDate" class="input"  required readonly><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="type">Type</label><br>
            <input type="text" id="type" name="type" class="input"  required readonly><br>
          </div>
          
        </div>
      </div>
     
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="healthCondition">Health Condition</label><br>
            <textarea id="healthCondition" name="healthCondition" class="commentBox" readonly></textarea> <br>
          </div>
        </div>
      </div> 
      
    </form>
  </div>

</div>
<script src="./../../js/modal.js"></script>
<?php

?>