<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
    <h1>Insurance claim case</h1><br>
<div class="form-container">
    <form action="#">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="customer">Customer</label><br>
                       <input type="text" id="customer" name="custName" class="input" value="MR.Perera" readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="claimID" >Claim ID</label><br>
                        <input type="text" id="claimID" name="claimID" class="input" value="005" readonly><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="admitDate">Admit Date</label><br>
                        <input type="date" id="admitDate" name="admitDate" class="input" value="2019-08-08" ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="ICUfromDate" >ICU from Date</label><br>
                        <input type="date" id="ICUfromDate" name="ICUfromDate" class="input"  value="2019-08-10" ><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="dischargeDate" >Discharge Date</label><br>
                        <input type="date" id="dischargeDate" name="dischargeDate" class="input" value="2019-08-15"  ><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label  for="ICUtoDate">ICU to Date</label><br>
                        <input type="date" id="ICUtoDate" name="ICUtoDate" class="input" value="2019-08-12"  ><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="hospital">Hospital</label><br>
                        <input type="text" id="hospital" name="hospital" class="input" value="Asiri" readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="condition" >condition</label><br>
                        <textarea type="text" id="condition" name="condition" class="commentBox" value="Conditions..."></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="row">
                        <div class="column">
                        <textarea readonly>DOC1</textarea>
                        </div>
                        <div class="column">
                        <input type="view" id="view"  class="editBtn" value= "View File" ><br>
                        </div>
                    </div>
                    <div class="row">
                        <textarea>DOC2</textarea>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="doctorComment">Scrutinizers' Comment</label><br>
                        <textarea  type="text" id="scruComment" name="scruComment" class="commentBox" placeholder="comments..."></textarea><br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <div class="formInput">
                    <label for="medScrut">Assign Doctor</label><br>
                    <select id="medScrut" name="medScrut" required>
                    <?php               
                    foreach ($data['medList'] as $medsRow){
                    echo "<option value= \"".$medsRow['empID']."\"";
                    if($medsRow['empID']==$data['caseDetails'][0]['medScruID']) echo "selected=\"selected\"";
                    echo "> MED".$medsRow['empID']." - ".$medsRow['empFirstName']." ".$medsRow['empLastName']."</option>";
                    }
                    ?>
                    <!-- options -->
                    </select><br>
                    </div>
                </div>

                <div class="column">
                </div>

                <div class="column">
                    <div class="formInput">
                        <label for="doctorComment">Doctors' Comment</label><br>
                        <textarea  type="text" id="doctorComment" name="doctorComment" class="commentBox" placeholder="comments..."></textarea><br>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="column">
                    <div class="formInput">
                        <a id="a" href="./../viewPendingCases/index" class="btn-submit" >Cancel</a>
                        </div>   
                    </div>
                    <div class="column">
                        <!--cmnt-->
                    </div>
                    <div class="column">
                        <!--cmnt-->
                    </div>
                    <div class="column">
                        <div class="formInput">
                         <input type="submit" id="submit" name="reviewCase" class="btn-submit" value= "Submit" ><br>
                        </div> 
                    </div>
                    
            </div>
    </form>
</div>
</div>