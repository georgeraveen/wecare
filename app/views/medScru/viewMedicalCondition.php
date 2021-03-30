
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li><a href="./../manageCustMedical/index">Manage medical details of customers</a></li>
    <li><a href="./../manageCustMedical/manageCustMedicalCondtions">Select Customer</a></li>
    <li>View medical details</a></li>
    </ul>
  <h1>Past Health conditions of Customer with ID: <?php echo $data['customerID'];
      ?> </h1>
  <div class="row">
    <div class="column">
     
    </div>
  </div>

  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Record ID</th>
        <th>Date</th>
        <th>Type</th>
        <th>Health Condition</th>
        <th>Comments</th>
      </tr>
      <?php
      foreach($data['medicalConditionList'] as $row){
        echo "<tr>"."<td>".$row['recordID']."</td>".
              "<td>".$row['date']."</td>".
              "<td>".$row['type']."</td>".
              "<td>".$row['healthCondition']."</td>".
              "<td>".$row['comments']."</td>".
              "</tr>";
      }
      ?>
    </table>
  </div>
</div>