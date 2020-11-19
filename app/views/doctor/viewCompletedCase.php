
<?php
//var_dump($data);
//var_dump($data['singleCaseDetails'][0]['custName']);


 ?>
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">

<div class="containers">
    <h1>Completed Case Details</h1><br>
<div class="form-container">



<form action="./updateCase" method="post">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="customer">Customer</label><br>
                       <input type="text" id="customer" name="custName" class="input" value="W.M.Jayasinghe" readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="claimID" >Claim ID</label><br>
                        <input type="text" id="claimID" name="claimID" class="input" value="5"  readonly><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="admitDate">Admit Date</label><br>
                        <input type="date" id="admitDate" name="admitDate" class="input" value="2020-09-04" readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="ICUfromDate" >ICU from Date</label><br>
                        <input type="date" id="ICUfromDate" name="ICUfromDate" class="input"  value="2020-11-04" readonly><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="dischargeDate" >Discharge Date</label><br>
                        <input type="date" id="dischargeDate" name="dischargeDate" class="input" value="2020-11-07" readonly ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label  for="ICUtoDate">ICU to Date</label><br>
                        <input type="date" id="ICUtoDate" name="ICUtoDate" class="input" value="2020-09-15" readonly> <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="hospital">Hospital</label><br>
                        <input type="text" id="hospital" name="hospital" class="input" value="Lanka" readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="condition" >condition</label><br>
                        <textarea  id="healthCondition" name="healthCondition" class="commentBox" readonly>asjfskjgkfgj</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="row">
                        <div class="column">
                        <ul>
                        <h4>Hospital Documents</h4>
                        <?php
                        $dir ="./../documents/claimCases/". $data['singleCaseDetails'][0]['claimID'];

                        // Sort in ascending order - this is default
                        $a = scandir($dir);

                        // Sort in descending order
                        //$b = scandir($dir,1);

                       // echo "<a href =\"./../documents/claimCases/"."5" . "/". $a[2] ."\">".$a[2]."</a>";
                        
                        ?>
<a href=medicalReports>medicalReprts</a>
                        </ul>           
                       
                        </div>
                        
                    </div>
                    
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="doctorComment">Doctor's Comment</label><br>
                        <textarea  type="text" id="doctorComment" name="doctorComment" class="commentBox" readonly >comment123</textarea><br>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
            <div class="formInput">
            <input type="submit" id="submit" name="editSingleCaseDetails" class="btn-submit" value= "Submit" ><br>
           
          </div>
            </div> -->

           



    </form>
</div>
</div>