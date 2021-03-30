
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/modal.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li>View weekly roster</a></li>
  </ul>
  <h1>View weekly roster</h1><br>
  <div class="form-container2">
    <form action="./viewRoster" >
        <div class="row">
            
            <div class="column">
                <select id="rostID" name="rostID" required>
                    <?php
                        foreach ($data as $value) {
                        echo "<option value=\"".$value["rosterID"]."\">".$value["rosterID"]. " - ".$value["date"]." - MGR".$value["managerID"] ."</option>";
                        }
                    ?>
                </select><br>
            </div>
           
        
            <div class="column">
                <div class="formInput">
                    <input type="submit" id="viewRoster" name="viewRoster" class="btn-submit" value="View"><br>
                    <!-- <a class="btn-submit" href="./viewRoster">View/Update</a> -->
                </div>
            </div>
        </div>
    </form>
  </div>
  <br><br>

  
</div>
