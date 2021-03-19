<?php
// var_dump($data['singleCaseDetails']);
?> 
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">

<div class="containers">
    <h1>View Case</h1><br>
    <div class="form-container">



    <form action="./viewCompletedCase" method="post" enctype="multipart/form-data">
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
                        <input type="text" id="claimID" name="claimID" class="input" value=<?php echo $data['singleCaseDetails'][0]['claimID']?>  readonly><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="admitDate">Admit Date</label><br>
                        <input type="date" id="admitDate" name="admitDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['admitDate']?>  readonly ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="ICUfromDate" >ICU from Date</label><br>
                        <input type="date" id="ICUfromDate" name="ICUfromDate" class="input"  value=<?php echo $data['singleCaseDetails'][0]['icuFromDate']?> readonly ><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="dischargeDate" >Discharge Date</label><br>
                        <input type="date" id="dischargeDate" name="dischargeDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['dischargeDate']?> readonly ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label  for="ICUtoDate">ICU to Date</label><br>
                        <input type="date" id="ICUtoDate" name="ICUtoDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['icuToDate']?>  readonly><br>
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
                    
                    <h4 for="fileToUpload">Hospital Documents</h4>
                    <ul>
                    <?php
                    try {
                        $dir ="./../documents/claimCases/". $data['singleCaseDetails'][0]['claimID'];
                        // Sort in ascending order - this is default
                        $ls = scandir($dir);

                        // Sort in descending order
                        //$b = scandir($dir,1);
                        // var_dump($ls);
                        for($i=2;$i < count($ls);$i++){
                            echo "<li>";
                            echo "<a href =\"./../../documents/claimCases/". $data['singleCaseDetails'][0]['claimID'] . "/". $ls[$i] ."\">".$ls[$i]."</a>";
                            echo "</li>";
                        }
                    } catch (\Throwable $th) {
                        echo "Empty Directory";
                    }
                    ?>
                    </ul>
                </div>
            </div>
                <!-- <div class="column">
                    
                    <input type="submit" id="submit" name="editSingleCaseDetails" class="btn-submit" value= "Submit" ><br>
                
                </div> -->
            </div>
        </form>
    </div>

