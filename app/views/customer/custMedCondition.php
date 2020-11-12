<?php

$result = array (
  array("recordID"=>"1","date"=>"2018-12-01","type"=>"Normal","healthCondition"=>"Fever","comments"=>"-"),
  array("recordID"=>"2","date"=>"2019-08-02","type"=>"Normal","healthCondition"=>"Fever","comments"=>"-"),
  array("recordID"=>"3","date"=>"2020-04-03","type"=>"Critical","healthCondition"=>"Heart attack","comments"=>"-"),
  array("recordID"=>"4","date"=>"2020-07-04","type"=>"Critical","healthCondition"=>"Heart attack","comments"=>"-")
);

?>

<!-- <link rel="stylesheet" href= "./../css/home.css"> -->
<link rel="stylesheet" href= "./../../css/custStyle.css">
<link rel="stylesheet" href= "./../../css/custStyle2.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<img src="./../../images/undraw_medical_research_qg4d.svg" class="img-background img-left">
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
    <form action="#" method="post">
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
              <option value="Critical">Critical</option>
              <option value="Normal">Normal</option>
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
<script src="./../../js/modal.js"></script>
<?php

?>