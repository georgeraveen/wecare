<?php


 //$result = array(
   // array("claimID"=>"1","custName"=>"Mr.Perera", "admitDate"=>"2020-08-01","name"=>"MEd1","name"=>"Asiri"),
   // array("claimID"=>"2", "custName"=>"Mr.Samarasinghe","admitDate"=>"2020-08-02","name"=>"MEd1","name"=>"Asiri"),
   // array("claimID"=>"3", "custName"=>"Mr.Fernando","admitDate"=>"2020-08-03","name"=>"MEd1","name"=>"Asiri"),
   // array("claimID"=>"4","custName"=>"Mr.Karunathilake", "admitDate"=>"2020-08-04","name"=>"MEd1","name"=>"Asiri"),
//);

?>


<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<ul class="breadcrumb">
    <li><a href="./../doctorHome/index">Home</a></li>
    <li>My Pending Queue</a></li>
  </ul>
<div class="containers">
    <h1>My Pending Queue</h1><br>
    <div class="table-container">
        <table class="table-view">
            <tr>
            <th>Claim ID</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Med.Scrutinizer</th>
            <th>Hospital</th>
            <th>Action</th>
            </tr>
                <?php
        foreach($data as $row){
            echo "<tr>"."<td>".$row['claimID']."</td>".
                
                "<td id=\"custName-".$row['claimID']."\">".$row['custName']."</td>".
                "<td id=\"admitDate-".$row['claimID']."\">".$row['admitDate']."</td>".
                "<td  id=\"name-".$row['recordID']."\">".$row['medSrcName']."</td>".
                "<td  id=\"name-".$row['recordID']."\">".$row['name']."</td>".
                "<td>  <a class=\"editBtn\" href=\"./editCase?action=edit&id=".$row['claimID']."\">View/Edit</a> "."</td>"."</tr>";
         }

                 ?>
        </table>
    </div>


</div>