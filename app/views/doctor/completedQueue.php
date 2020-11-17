<?php


 $result = array(
    array("claimID"=>"5","custName"=>"W.M.Jayasinghe", "admitDate"=>"2020-09-04","nameM"=>"C.M.Edirisinghe","name"=>"Lanka"),
    array("claimID"=>"2", "custName"=>"Daya Samarasinghe","admitDate"=>"2020-08-02","nameM"=>"Kapila perera","name"=>"Asiri"),
    array("claimID"=>"3", "custName"=>"George Fernando","admitDate"=>"2020-08-03","nameM"=>"Kapila perera","name"=>"Asiri"),
    array("claimID"=>"4","custName"=>"Thusitha Karunathilake", "admitDate"=>"2020-08-04","nameM"=>"Kapila perera","name"=>"Asiri"),
);

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
            <th>Med.Scrutinizer</th>
            <th>Hospital</th>
            <th>Action</th>
            </tr>
                <?php
        foreach($result as $row){
            echo "<tr>"."<td>".$row['claimID']."</td>".
                
                "<td id=\"custName-".$row['claimID']."\">".$row['custName']."</td>".
                "<td id=\"admitDate-".$row['claimID']."\">".$row['admitDate']."</td>".
                "<td  id=\"name-".$row['recordID']."\">".$row['nameM']."</td>".
                "<td  id=\"name-".$row['recordID']."\">".$row['name']."</td>".
                //"<td>  <a class=\"editBtn\" href=\"./editCase?action=edit&id=".$row['claimID']."\">View</a> "."</td>"."</tr>";
                "<td>  <a onclick=\"clickView(".$row['recordID'].")\" class=\"editBtn\" href=\"./review".$row['recordID']."\">View </a> "."</td>"."</tr>";
         }

                 ?>
        </table>
    </div>


</div>