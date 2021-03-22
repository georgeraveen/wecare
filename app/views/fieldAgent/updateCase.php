 <?php
 //var_dump($data['singleCaseDetails']);
?> 
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">

<div class="containers">
    <h1>Update Case</h1><br>
    <div class="form-container">



    <form action="./updateCase" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="customer">Customer</label><br>
                        <input type="text" id="customer" name="custName" class="input" value=<?php echo $data['singleCaseDetails'][0]['custName']?> readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="claimID" >Claim ID</label><br>
                        <input type="text" id="claimID" name="claimID" class="input" value=<?php echo $data['singleCaseDetails'][0]['claimID']?> readonly><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="admitDate">Admit Date</label><br>
                        <input type="date" id="admitDate" name="admitDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['admitDate']?> ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="ICUfromDate" >ICU from Date</label><br>
                        <input type="date" id="ICUfromDate" name="ICUfromDate" class="input"  value=<?php echo $data['singleCaseDetails'][0]['icuFromDate']?> ><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="dischargeDate" >Discharge Date</label><br>
                        <input type="date" id="dischargeDate" name="dischargeDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['dischargeDate']?>  ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label  for="ICUtoDate">ICU to Date</label><br>
                        <input type="date" id="ICUtoDate" name="ICUtoDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['icuToDate']?>  ><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="hospital">Hospital</label><br>
                        <input type="text" id="hospital" name="hospital" class="input" value="<?php echo $data['singleCaseDetails'][0]['name']?>" readonly><br>
                    </div>
                </div>
            
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="fileToUpload">Upload Hospital Documents</label>
                        <input type="file" id="fileToUpload" name="fileToUpload[]" multiple accept=".pdf, image/*">
                    </div>
                </div>
                <div class="column">
                    
                    <input type="text" id="deleteFile" name="deleteFile" class="input hide" hidden>
                    <h4 for="fileToUpload">Hospital Documents</h4>
                    <table>
                    <?php
                    try {
                        $dir ="./../documents/claimCases/". $data['singleCaseDetails'][0]['claimID'];
                        // Sort in ascending order - this is default
                        $ls = scandir($dir);

                        // Sort in descending order
                        //$b = scandir($dir,1);
                        // var_dump($ls);
                        for($i=2;$i < count($ls);$i++){
                            $filename=pathinfo($ls[$i],PATHINFO_FILENAME);
                            $ext=pathinfo($ls[$i],PATHINFO_EXTENSION);
                            echo "<tr id=\"file$i\">";
                            echo "<td><a id=\"txt-$i\" href =\"./viewFil/". $data['singleCaseDetails'][0]['claimID'] . "/". $filename."/".$ext ."\">".$ls[$i]."</a></td>";
                            echo  "<td>  <div id=\"btn-$i\" class=\"btn-delete\" onClick=\"sendDelete($i)\"> X </div></td>";
                            echo "</tr>";
                        }
                    } catch (\Throwable $th) {
                        echo "Empty Directory";
                    }
                    ?>
                    </table>
                </div>
                </div>
            <div class= "roe">
                <div class="column">
                    <div class="formInput">
                    <input type="submit" id="submit" name="editSingleCaseDetails" class="btn-submit" value= "Submit" ><br>
                
                </div>
          </div>
        </form>
    </div>

    <script type="text/javascript" src="./../../js/files.js"></script>
