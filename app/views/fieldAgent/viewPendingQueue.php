<?php
require_once("./../config/config.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    // not logged in send to login page
    redirect("./../index.php");
}
 if($_SESSION["rolecode"]!="FAG"){
    die("You dont have the permission to access this page");
 }



 include './../header.php';


 $result = array(
    array("claimID"=>"1","custName"=>"Mr.Perera", "admitDate"=>"2020-08-01","name"=>"MEd1","name"=>"Asiri","status"=>"Need a doctor"),
    array("claimID"=>"2", "custName"=>"Mr.Samarasinghe","admitDate"=>"2020-08-02","name"=>"MEd1","name"=>"Asiri","status"=>"complete"),
    array("claimID"=>"3", "custName"=>"Mr.Fernando","admitDate"=>"2020-08-03","name"=>"MEd1","name"=>"Asiri","status"=>"complete"),
    array("claimID"=>"4","custName"=>"Mr.Karunathilake", "admitDate"=>"2020-08-04","name"=>"MEd1","name"=>"Asiri","status"=>"Need a doctor"),
);

?>



<link rel="stylesheet" href= "./../css/home.css">
<link rel="stylesheet" href= "./../css/style.css">


<div class="containers">
    <h1>My pending queue</h1><br>
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
                "<td  id=\"name-".$row['recordID']."\">".$row['name']."</td>".
                "<td  id=\"name-".$row['recordID']."\">".$row['name']."</td>".
                "<td  id=\"status-".$row['recordID']."\">".$row['status']."</td>".
                "<td>  <a onclick=\"clickView(".$row['recordID'].")\" class=\"editBtn\" href=\"./updateCase.php".$row['recordID']."\">View </a> "."</td>"."</tr>";
         }

?>
        </table>
    </div>
</div>