
<?php 
    $contactDetails="";
    foreach($data["empContactDetails"] as $row){
    $contactDetails .= $row["empContactNo"];
    $contactDetails .= ",";
}
$contDetails = rtrim($contactDetails, ',');
?>
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Update employee Profiles</h1><br>
    <div class="form-container">

        <form action="./updateEmployee" method="post">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empID">Employee ID</label><br>
                        <input type="text" id="empID" name="empID" class="input" readonly value=<?php echo $data['empDetails'][0]['empID']?>><br>
                    </div>

                    <div class="formInput">
                        <label for="empFirstName">First Name</label><br>
                        <input type="text" id="empFirstName" name="empFirstName" class="input" value=<?php echo $data['empDetails'][0]['empFirstName']?>><br>
                    </div>
                
                    <div class="formInput">
                        <label for="empLastName">Last Name</label><br>
                        <input type="text" id="empLastName" name="empLastName" class="input" value=<?php echo $data['empDetails'][0]['empLastName']?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="empAddress">Address</label><br>
                        <textarea id="empAddress" name="empAddress" class="commentBox"><?php echo $data['empDetails'][0]['empAddress']; ?></textarea> <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empNIC">NIC</label><br>
                        <input type="text" id="empNIC" name="empNIC" class="input" value=<?php echo $data['empDetails'][0]['empNIC']?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="empTypeID">Role</label><br>
                        <select id="empTypeID" name="empTypeID"> 
                            <option value="DEO" <?php echo ($data['empDetails'][0]['empTypeID'] =="DEO" ? ("selected") : (""))?>>DEO</option>
                            <option value="DOC" <?php echo ($data['empDetails'][0]['empTypeID'] =="DOC" ? ("selected") : (""))?>>DOC</option>
                            <option value="FAG" <?php echo ($data['empDetails'][0]['empTypeID'] =="FAG" ? ("selected") : (""))?>>FAG</option>
                            <option value="MED" <?php echo ($data['empDetails'][0]['empTypeID'] =="MED" ? ("selected") : (""))?>>MED</option>
                            <option value="MGR" <?php echo ($data['empDetails'][0]['empTypeID'] =="MGR" ? ("selected") : (""))?>>MGR</option>
                        </select><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" class="input" value=<?php echo $data['empDetails'][0]['email']?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="gender">Gender</label><br>
                        <select id="gender" name="gender">
                            <option value="m" <?php echo ($data['empDetails'][0]['gender'] =="m" ? ("selected") : (""))?>>Male</option>
                            <option value="f" <?php echo ($data['empDetails'][0]['gender'] =="f" ? ("selected") : (""))?>>Female</option>
                            <option value="o" <?php echo ($data['empDetails'][0]['gender'] =="o" ? ("selected") : (""))?>>Other</option>
                        </select><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empContactNo">Contact numbers</label><br>
                        <input type="text" id="empContactNo" name="empContactNo" class="input" placeholder="Enter numbers with comma seperated" value=<?php echo $contDetails ?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="hidden" id="hide" name="hide" class="input" value="hide"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="resetPassword" name="resetPassword" class="btn-submit" value="Password Reset"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empDOB">Date of birth</label><br>
                        <input type="Date" id="empDOB" name="empDOB" class="input" value=<?php echo $data['empDetails'][0]['empDOB']?>><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="hidden" id="hide" name="hide" class="input" value="hide"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="update" name="editEmployee" class="btn-submit" value="Update"><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
