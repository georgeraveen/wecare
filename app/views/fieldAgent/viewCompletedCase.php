<?php
 //var_dump($data['singleCaseDetails']);
?> 
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">

<div class="containers">
    <h1>Update Case</h1><br>
    <div class="form-container">



    <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="customer">Customer</label><br>
                        <input type="text" id="customer" name="custName" class="input" value="Hasitha Edirisinghe" readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="claimID" >Claim ID</label><br>
                        <input type="text" id="claimID" name="claimID" class="input" value="5" readonly><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="admitDate">Admit Date</label><br>
                        <input type="date" id="admitDate" name="admitDate" class="input" value="2020-10-15" readonly ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="ICUfromDate" >ICU from Date</label><br>
                        <input type="date" id="ICUfromDate" name="ICUfromDate" class="input"  value="2020-11-04" readonly ><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="dischargeDate" >Discharge Date</label><br>
                        <input type="date" id="dischargeDate" name="dischargeDate" class="input" value="2020-11-15" readonly ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label  for="ICUtoDate">ICU to Date</label><br>
                        <input type="date" id="ICUtoDate" name="ICUtoDate" class="input" value="2020-11-10"  readonly><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="hospital">Hospital</label><br>
                        <input type="text" id="hospital" name="hospital" class="input" value="lanka" readonly><br>
                    </div>
                </div>
            
            </div>
            <div class="row">
            <div class="column">
                    
                        <h4 for="fileToUpload">Hospital Documents</h4>
                        <ul>
                        <?php
                        $dir ="./../documents/claimCases/". "5";

                        // Sort in ascending order - this is default
                        $a = scandir($dir);

                        // Sort in descending order
                        //$b = scandir($dir,1);

                        echo "<a href =\"./../documents/claimCases/". $data['singleCaseDetails'][0]['claimID'] . "/". $a[2] ."\">".$a[2]."</a>";

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

