<?php
//var_dump($data);
echo $data['caseDetails'][0]['empName'];
?>

<link rel="stylesheet" href="./../../css/home.css">
<link rel="stylesheet" href="./../../css/style.css">
<div class="containers">
    <ul class="breadcrumb">
        <li><a href="./../managerHome/index">Home</a></li>
        <li><a href="./index">View Reports</a></li>
        <li>Manage over payment case</a></li>
    </ul>
    <h1>Review Cases</h1><br>
    <div class="form-container">
        <form action="./updateOvePaid" method="post">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="claimID">Claim ID</label><br>
                        <input type="text" id="claimID" name="claimID" class="input" readonly value=<?php echo $data['caseDetails'][0]['claimID'] ?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="dischargeDate">Date</label><br>
                        <input type="text" id="dischargeDate" name="dischargeDate" class="input" readonly value=<?php echo $data['caseDetails'][0]['dischargeDate'] ?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="caseStatus">Med scrutinizer</label><br>
                        <input type="text" id="empName" name="empName" class="input" readonly value=<?php echo $data['caseDetails'][0]['empName'] ?>><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="overPaidValue">Overpayment Amount</label><br>
                        <input type="text" id="overPaidValue" name="overPaidValue" required class="input" value=<?php echo $data['caseDetails'][0]['overPaidAmount'] ?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="remark">Remark</label><br>
                        <input type="text" id="remark" name="remark" required class="input" value=<?php echo $data['caseDetails'][0]['remark'] ?>><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <a class="deleteBtn" href="./index">Cancel</a>
                </div>
                <div class="column">
                    <input type="hidden" id="hide" name="hide" class="input" value="hide"><br>
                </div>
                <div class="column">
                    <input type="hidden" id="hide" name="hide" class="input" value="hide"><br>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="editOverPaid" name="editOverPaid" class="btn-submit" value="Edit Over Payment"><br>
                    </div>
                </div>
            </div>
        </form>
        </form>
    </div>
</div>