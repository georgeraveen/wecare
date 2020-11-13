<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>View Employees</h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>NIC</th>
        <th>Address</th>
        <th>Email</th>
        <th>Type</th>
        <th colspan="2" style="text-align:center">Action</th>
      </tr>
      <?php
      foreach($data as $row){
        echo "<tr>"."<td>".$row['empID']."</td>".
              "<td>".$row['empFirstName']."</td>".
              "<td>".$row['empLastName']."</td>".
              "<td>".$row['gender']."</td>".
              "<td>".$row['empNIC']."</td>".
              "<td>".$row['empAddress']."</td>".
              "<td>".$row['email']."</td>".
              "<td>".$row['empTypeID']."</td>".
              "<td> <a class=\"deleteBtn\" href=\"./deleteEmployee?action=delete&id=".$row['empID']."\">Delete</a> "."</td>".
              "<td> <a class=\"editBtn\" href=\"./editEmployee?action=edit&id=".$row['empID']."\">Edit</a> "."</td>"."</tr>";
      }

      ?>
    </table>
    
  </div>
</div>