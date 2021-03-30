
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li><a href="./../manageCustMedical/index">Manage medical details of customers</a></li>
    <li><a href="./../manageCustMedical/manageCustMedicalCondtions">Select Customer</a></li>
    <li>View medical details</a></li>
    </ul>
  <h1>Past Health conditions of Customer *Customer Name*, *Cust ID*</h1>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Record ID</th>
        <th>Customer ID</th>
        <th>Date</th>
        <th>Type</th>
        <th>Health Condition</th>
        <th>Comments</th>
      </tr>
      <!-- <?php
      foreach($data['queue'] as $row){
        echo "<tr>"."<td>".$row['claimID']."</td>".
              "<td>".$row['dischargeDate']."</td>".
              "<td>".$row['caseStatus']."</td>".
              "<td>".$row['name']."</td>".
              "<td>".$row['fag']."</td>".
              "<td>".$row['doc']."</td>".
              "<td><a class=\"editBtn\" href=\"./editCase?action=edit&id=".$row['claimID']."\">View/Edit</a> "."</td>"."</tr>";
      }
      ?> -->

     
    </table>
    
  </div>
</div>