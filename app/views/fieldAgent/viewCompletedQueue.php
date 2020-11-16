<?php
//var_dump($data);


  $result = array(
    array("claimID"=>"1","custName"=>"Mr.Perera", "admitDate"=>"2020-08-01","name1"=>"MEd1","name"=>"Asiri","status"=>"Need a doctor"),
     array("claimID"=>"2", "custName"=>"Mr.Samarasinghe","admitDate"=>"2020-08-02","name1"=>"MEd2","name"=>"Asiri","status"=>"complete"),
    array("claimID"=>"3", "custName"=>"Mr.Fernando","admitDate"=>"2020-08-03","name1"=>"MEd3","name"=>"Asiri","status"=>"complete"),
    array("claimID"=>"4","custName"=>"Mr.Karunathilake", "admitDate"=>"2020-08-04","name1"=>"MEd4","name"=>"Asiri","status"=>"Need a doctor"),
);

?> 
link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">


<div class="containers">
    <h1>My Completed Cases Queue</h1><br>
    <div class="table-container">
        <table class="table-view">
        <tr>
            <th>Claim ID</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Med.Scrutinizer</th>
            <th>Hospital</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
 <?php
        foreach($result as $row){
            echo "<tr>"."<td>".$row['claimID']."</td>".
                 "<td id=\"custName-".$row['claimID']."\">".$row['custName']."</td>".
                "<td id=\"admitDate-".$row['claimID']."\">".$row['admitDate']."</td>".
                "<td  id=\"name-".$row['recordID']."\">".$row['name1']."</td>".
                "<td  id=\"name-".$row['recordID']."\">".$row['name']."</td>".
                "<td  id=\"status-".$row['recordID']."\">".$row['caseStatus']."</td>".
                "<td>  <a class=\"editBtn\" href=\"./../viewCompletedQueue/review"".$row['claimID']."\">View/Edit</a> "."</td>"."</tr>";
         }
         

?>
        </table>
    </div>
</div>
