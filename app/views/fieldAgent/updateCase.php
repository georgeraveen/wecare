
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">

<div class="containers">
    <h1>Update Case</h1><br>
    <div class="form-container">



        <form action="#" method="post" enctype="multipart/form-data" >
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
                        <input type="text" id="hospital" name="hospital" class="input" value="Asiri" ><br>
                    </div>
                </div>
            
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="documentDIR">Upload Hospital Documents</label>
                        <input type="file" id="documentDIR" name="documentDIR" multiple accept=".pdf, image/*">
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                    <input type="submit" id="submit" name="reviewCase" class="btn-submit" value= "Submit" ><br>
                
                </div>
            </div>
        </form>
    </div>
</div>