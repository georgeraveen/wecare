<?php
 var_dump($data);
// var_dump($data['singleCaseDetails']);
?>
<link rel="stylesheet" href= "./../../css/custStyle.css">
<img src="./../../images/undraw_personal_site_xyd1.svg" class="img-background">

<div class="profile-container">
  <form method="post" action="./updateCustDeatails">
    <div class="boxCard">
      <h2>View My Profile</h2>
      <h3><?php echo $data[0][0]["custName"]?></h3>
      <h4>Email : <input type="email" id="email" name="email" class="input email" value="<?php echo $data[0][0]["email"]?>"></h4>
      <h4>Birthday : <?php echo $data[0][0]["custDOB"]?></h4>
      <h4>Address : <textarea id="custAddress" name="custAddress" class="input address" rows="3"><?php echo $data[0][0]['custAddress'] ?></textarea></h4>
      <h4>Contact :<input type="number" id="contact" name="contact" class="input contact" value="<?php echo $data[0]["custContactNo"]?> "> <button type="button" onClick="addNumber()" class="btn-add" id="btn-add">Add</button></h4>
      <div id="contactList" class="contactList">
        <?php
         $contacts="";
          foreach ($data[1] as $value) {
            $contacts.=(",".$value["custContactNo"]);
            echo "<h5 id=".$value["custContactNo"].">".$value["custContactNo"]."    <button class=\"btn-rm\" type=\"button\" onClick=\"removeNum(".$value["custContactNo"].")\">X</button></h5>";
          }
        ?>
      </div>
      <h4>Monthly payment day  :<?php echo explode("-", $data[2][0]['paymentDate'],3)[2]; ?> </h4>
      <h4>Type : <?php echo $data[2][0]["type"]?></h4>
      <h4>Gender :<?php echo (($data[0][0]["gender"]=='m') ? 'Male': (($data[0][0]["gender"]=='f') ? 'Female':'Other')) ?> </h4>
      <div class="row">
      <div class="column">
                    
                    <input type="text" id="deleteFile" name="deleteFile" class="input hide" hidden>
                    <h4 for="fileToUpload">policy Documents</h4>
                    <table>
                    <?php
                    try {
                        $dir ="./../documents/policy/". $data[0]['policyID'];
                        // Sort in ascending order - this is default
                        $ls = scandir($dir);

                        // Sort in descending order
                        //$b = scandir($dir,1);
                        // var_dump($ls);
                        for($i=2;$i < count($ls);$i++){
                            $filename=pathinfo($ls[$i],PATHINFO_FILENAME);
                            $ext=pathinfo($ls[$i],PATHINFO_EXTENSION);
                            echo "<tr id=\"file$i\">";
                            echo "<td><a id=\"txt-$i\" href =\"./viewFil/". $data[0]['policyID'] . "/". $filename."/".$ext ."\">".$ls[$i]."</a></td>";
                            echo  "<td>  <div id=\"btn-$i\" class=\"btn-delete\" onClick=\"sendDelete($i)\"> X </div></td>";
                            echo "</tr>";
                        }
                    } catch (\Throwable $th) {
                        echo "Empty Directory";
                    }
                    ?>
                    </table>
                </div>
          <div class="column">
                <input type="submit" id="updateDetails" name="updateDetails" class="btn-submit" value="Update Details"><br>
          </div>


      </div>
     
      
      <input hidden type="text" id="custContacts" name="custContact"  class="input hide" value="<?php echo $contacts; ?>" ><br>
    </div>
  </form>
</div>
<!-- <div class="grid-container">
  
</div> -->


<script type="text/javascript" src="./../../js/customer.js"></script>
