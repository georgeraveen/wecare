<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">  
<ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li><a href="./../viewPendingCases/viewCase">Scrutinizer Pending cases queue</a></li>
    <li>Process case</a></li>
  </ul>
  <h1>Process insurance Claim Case</h1><br>
  <div class="form-container">
  <form action="./updateCase" method="post" onSubmit="showLoader()">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="customer">Customer Name</label><br>
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
                        <input type="date" id="admitDate" name="admitDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['admitDate']?> readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="ICUfromDate" >ICU from Date</label><br>
                        <input type="date" id="ICUfromDate" name="ICUfromDate" class="input"  value=<?php echo $data['singleCaseDetails'][0]['icuFromDate']?> readonly><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="dischargeDate" >Discharge Date</label><br>
                        <input type="date" id="dischargeDate" name="dischargeDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['dischargeDate']?> readonly><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label  for="ICUtoDate">ICU to Date</label><br>
                        <input type="date" id="ICUtoDate" name="ICUtoDate" class="input" value=<?php echo $data['singleCaseDetails'][0]['icuToDate']?> readonly><br>
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
                <div class="column">
                    <div class="formInput">
                        <label for="condition" >condition</label><br>
                        <textarea readonly  id="healthCondition" name="healthCondition" class="commentBox" ><?php echo $data['singleCaseDetails'][0]['healthCondition']?></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="row">
                      <div class="column">
                        <h4 for="fileToUpload">Hospital Documents</h4>
                          <ul>
                          <?php
                          try {
                          $dir ="./../documents/claimCases/". $data['singleCaseDetails'][0]['claimID'];
                          //var_dump($data);
                          // Sort in ascending order - this is default
                          $ls = scandir($dir);

                          // Sort in descending order
                          //$b = scandir($dir,1);
                          // var_dump($ls);
                            for($i=2;$i < count($ls);$i++){
                            $filename=pathinfo($ls[$i],PATHINFO_FILENAME);
                            $ext=pathinfo($ls[$i],PATHINFO_EXTENSION);
                            echo "<li>";
                            echo "<a href =\"./viewFil/". $data['singleCaseDetails'][0]['claimID'] . "/". $filename."/".$ext ."\">".$ls[$i]."</a>";
                            echo "</li>";
                            }
                          } 
                          catch (\Throwable $th) {
                          echo "Empty Directory";
                          }
                          ?>
                          </ul>
                      </div>   
                    </div> 
                  </div>
                <div class="column">
                    <div class="formInput">
                        <label for="doctorComment">Doctor's Comment</label><br>
                        <textarea  type="text" id="doctorComment" name="doctorComment" class="commentBox" readonly ><?php echo $data['singleCaseDetails'][0]['doctorComment']?></textarea><br>
                    </div>
                </div>
            </div>
            
            <div class="row">
            <div class="column">
                <?php echo "Please Validate the data before Submitting" ?>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="payAmount">Payable Amount</label><br>
                        <input type="number" id="payAmount" name="payAmount" class="input"><br>
                    </div>
                </div>
            </div>
            <div class="row">  
                <div class="column">
                <div class="formInput">
                <input type="submit" id="caseSubmit" name="caseSubmit" class="btn-submit" value= "Submit" ><br>
                </div>
              </div>
              <div class="column">
                <div class="formInput">
                <input type="submit" id="caseReject" name="caseReject" class="btn-submit" value= "Reject" ><br>
                </div>
              </div>
              <div class="column">
                <div class="formInput">
                <input type="submit" id="cancel" name="cancel" class="btn-submit" value= "Cancel"><br>
                </div>
              </div>      
            </div>
             

    </form>
  </div>
  <div class="form-container2">
  <form action="./assignDoc" method="post" onSubmit="showLoader()">
        <div class="row">
              <div class="column">
                <div class="formInput">
                  <label for="Doc">Assign Doctor</label><br>
                  <select id="Doc" name="Doc">
                  <?php
                  foreach ($data['docList'] as $docsRow){
                  echo "<option value= \"".$docsRow['empID']."\"";
                  if($docsRow['empID']==$data['caseDetails'][0]['doctorID']) echo "selected=\"selected\"";
                  echo "> DOC".$docsRow['empID']." - ".$docsRow['empFirstName']." ".$docsRow['empLastName']."</option>";
                  }
                  ?>
                  </select><br>
                </div>
                <?php
                //var_dump($data);
                ?>
              </div>
        </div>
          <div class="row">
          <div class="column">
                <div class="formInput">
                <input type="submit" id="assignDoc" name="assignDoc" class="btn-submit" value= "Assign Doctor" ><br>
                <input type="hidden" id="assignDoc" name="claimID" value= <?php echo $data['singleCaseDetails'][0]['claimID'];?>>
                </div>
          </div>
          </div>
  </form>
</div>