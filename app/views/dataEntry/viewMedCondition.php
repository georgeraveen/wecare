<?php

$result = array (
  array("recordID"=>"1","date"=>"2020-08-01","type"=>"Accidental","healthCondition"=>"Broken leg","comments"=>""),
  array("recordID"=>"2","date"=>"2020-08-02","type"=>"Accidental","healthCondition"=>"Brain damage","comments"=>""),
  array("recordID"=>"3","date"=>"2020-08-03","type"=>"Congenital","healthCondition"=>"Heart disease","comments"=>""),
  array("recordID"=>"4","date"=>"2020-08-04","type"=>"Genetical","healthCondition"=>"High gloucose","comments"=>"")
);

?>

<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<div class="containers">
  <h1>View Medical Condition</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Record ID</th>
        <th>Date</th>
        <th>Type</th>
        <th colspan="2">Action</th>
      </tr>
      <?php
      foreach($result as $row){
        echo "<tr>"."<td>".$row['recordID']."</td>".
              "<td id=\"date-".$row['recordID']."\">".$row['date']."</td>".
              "<td id=\"type-".$row['recordID']."\">".$row['type']."</td>".
              "<td hidden id=\"healthCondition-".$row['recordID']."\">".$row['healthCondition']."</td>".
              "<td hidden id=\"comments-".$row['recordID']."\">".$row['comments']."</td>".
              "<td> <a class=\"deleteBtn\" href=\"#".$row['recordID']."\">Delete</a> <a onclick=\"clickView(".$row['recordID'].")\" class=\"editBtn\" href=\"#".$row['recordID']."\">View / Edit</a> "."</td>"."</tr>";
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
              <option value="Accidental">Accidental</option>
              <option value="Congenital">Congenital</option>
              <option value="Genetical">Genetical</option>
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
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="comments">Comments</label><br>
            <textarea id="comments" name="comments" class="commentBox"></textarea> <br>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="column">
          <div class="formInput">
            <input type="submit" id="editMedCondition" name="editMedCondition" class="btn-submit" value="Update medical condition"><br>
            <input hidden type="text" id="medID" name="medID" ><br>
          </div>
        </div>
      </div>
    </form>
  </div>

</div>
<script src="./../../js/modal.js"></script>