<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Hospitals</h1><br>
    <div class="form-container">

        <form action="#" method="post">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empFirstName">Hospital Name</label><br>
                        <input type="text" id="empFirstName" name="empFirstName" required class="input"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="empLastName">Contact Number</label><br>
                        <input type="text" id="empLastName" name="empLastName" required class="input"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="empAddress">Address</label><br>
                        <textarea id="empAddress" name="empAddress" class="commentBox"></textarea> <br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="newHospital" name="newHospital" class="btn-submit" value="Submit"><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div style="width : 70%" class="table-container">
    <table class="table-view">
      <tr>
        <th>Hospital Name</th>
        <th>Contact Number</th>
        <th>Address</th>
      </tr>
      <?php
      foreach($data as $row){
        echo "<tr>"."<td>".$row['name']."</td>".
              "<td>".$row['hospitalContactNo']."</td>".
              "<td>".$row['address']."</td>"."</tr>";
      }
      ?>
    </table>
</div>
