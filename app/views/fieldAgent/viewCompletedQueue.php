<?php
// var_dump($data);
$result=$data;

//  $result = array(
//      array("claimID"=>"5","custName"=>"Hasith Edirisinghe", "admitDate"=>"2020-08-01","nameM"=>"Kapila Perera","name"=>"Lanka","status"=>"Processing"),
//      array("claimID"=>"2", "custName"=>"Daya Samarasinghe","admitDate"=>"2020-08-02","nameM"=>"Kapila Perera","name"=>"Asiri","status"=>"Processing"),
//      array("claimID"=>"3", "custName"=>"George Fernando","admitDate"=>"2020-08-03","nameM"=>"Kapila Perera","name"=>"Asiri","status"=>"Processing"),
//      array("claimID"=>"4","custName"=>"Thusitha Karunathilake", "admitDate"=>"2020-08-04","nameM"=>"Kapila Perera","name"=>"Asiri","status"=>"Processing"),
//  );

?> 



<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">


<div class="containers">
    <h1>My Completed Queue</h1><br>
    <div class="table-container">
        <table class="table-view">
        <tr>
            <th>Claim ID</th>
            <th>Customer Name</th>
            <th>Date</th>
            <th>Med. Scrutinizer</th>
            <th>Hospital</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
 <?php
        foreach($result as $row){
            echo "<tr>"."<td>".$row['claimID']."</td>".
                 "<td id=\"custName-".$row['claimID']."\">".$row['custName']."</td>".
                "<td id=\"admitDate-".$row['claimID']."\">".$row['admitDate']."</td>".
                "<td  id=\"name-".$row['claimID']."\">".$row['medSrcName']."</td>".
                "<td  id=\"name-".$row['claimID']."\">".$row['name']."</td>".
                "<td  id=\"status-".$row['claimID']."\">".$row['caseStatus']."</td>".
                "<td>  <a  class=\"editBtn\" href=\"./review?id=".$row['claimID']."\">View </a> "."</td>"."</tr>";
         }
         

?>
        </table>
    </div>
</div>
