<?php
//var_dump($data);
//echo $data['caseDetails'][0]['claimID'];
?>

<link rel="stylesheet" href="./../../css/home.css">
<link rel="stylesheet" href="./../../css/style.css">
<div class="containers">
    <ul class="breadcrumb">
        <li><a href="./../managerHome/index">Home</a></li>
        <li><a href="./index">View Reports</a></li>
        <li>Manage Cases</a></li>
    </ul>
    <h1>Review Cases</h1><br>
    <div class="form-container">
        <form action="./overPaidCase" method="post">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="claimID">Claim ID</label><br>
                        <input type="text" id="claimID" name="claimID" class="input" readonly value=<?php echo $data['caseDetails'][0]['claimID'] ?>><br>
                    </div>

                    <div class="formInput">
                        <label for="policyID">Policy ID</label><br>
                        <input type="text" id="policyID" name="policyID" class="input" readonly value=<?php echo $data['caseDetails'][0]['policyID'] ?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="caseStatus">Status</label><br>
                        <input type="text" id="caseStatus" name="caseStatus" class="input" readonly value=<?php echo $data['caseDetails'][0]['caseStatus'] ?>><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="dischargeDate">Date</label><br>
                        <input type="text" id="dischargeDate" name="dischargeDate" class="input" readonly value=<?php echo $data['caseDetails'][0]['dischargeDate'] ?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="name">Hospital</label><br>
                        <input type="text" id="name" name="name" class="input" readonly value=<?php echo $data['caseDetails'][0]['name'] ?>><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="payableAmount">Payable Amount</label><br>
                        <input type="text" id="payableAmount" name="payableAmount" class="input" readonly value=<?php echo $data['caseDetails'][0]['payableAmount'] ?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="custFeedback">Feedback</label><br>
                        <input type="text" id="custFeedback" name="custFeedback" class="input" readonly value=<?php echo $data['caseDetails'][0]['custFeedback'] ?>><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="overPaidValue">Over Payment Value</label><br>
                        <input type="text" id="overPaidValue" name="overPaidValue" required class="input" value=""><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="remark">Remark</label><br>
                        <input type="text" id="remark" name="remark" required class="input" value=""><br>
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
                        <input type="submit" id="overPayment" name="overPayment" class="btn-submit" value="Over Payment"><br>
                    </div>
                </div>
            </div>
        </form>
        </form>
    </div>
</div>