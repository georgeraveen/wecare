
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
    <ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li><a href="./../manageCustMedical/index">Manage medical details of customers</a></li>
    <li>Select customer</a></li>
    </ul>
  <h1>Customer past medical history</h1><br>
  <h2 style="text-align:center">Select customer</h2><br>
  <div class="form-container2">
    <form>
      <div class="row">
        <div class="column">
        <select id="customer" name="customer" required>
              <!-- <option>Customer ID - Customer Name</option> -->
              <?php               
               foreach ($data['custList'] as $customersRow){
                echo "<option value= \"".$customersRow['custID']."\"> CUST".$customersRow['custID']." - ".$customersRow['custName']."</option>";
                }
              ?>  
            </select><br>
        </div>
        <div class="column">
          <div class="formInput">
            <a id="a" href="./../manageCustMedical/viewConditions" class="btn-submit" >Submit</a>
          </div>
        </div>
      </div>
    </form>
  </div>




      <!-- <?php
      foreach($data['custBasicList'] as $row){
        echo "<tr>"."<td>".$row['custID']."</td>".
              "<td>".$row['custName']."</td>".
              "<td>".$row['custNIC']."</td>".
              "<td>".$row['custContact']."</td>".
              "<td><a class=\"viewBtn\" href=\"./../manageCustMedical/viewConditions\">View</a> "."</td>"."</tr>";
      }
      ?> -->

  