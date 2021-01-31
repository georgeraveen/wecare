
<?php 
    $contactDetails="";
    foreach($data["hostContactDetails"] as $row){
    $contactDetails .= $row["hospitalContactNo"];
    $contactDetails .= ",";
}
$contDetails = rtrim($contactDetails, ',');
?>
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../managerHome/index">Home</a></li>
    <li><a href="./index">View Hospitals</a></li>
    <li>Manage Hospitals</a></li>
  </ul>
  <h1>Manage Hospitals</h1><br>
    <div class="form-container">

        <form action="./updateHospital" method="post">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="hospitalID">Hospital ID</label><br>
                        <input type="text" id="hospitalID" name="hospitalID" class="input" readonly value="<?php echo $data['hostDetails'][0]['hospitalID']?>"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="name">Hospital Name</label><br>
                        <input type="text" id="name" name="name" required class="input" value="<?php echo $data['hostDetails'][0]['name'];?>"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="hospitalContactNo">Contact Number</label><br>
                        <input type="text" id="hospitalContactNo" name="hospitalContactNo" class="input" value="<?php echo $contDetails ?>"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="address">Address</label><br>
                        <textarea id="address" name="address" class="commentBox" ><?php echo $data['hostDetails'][0]['address']; ?></textarea> <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="newHospital" name="newHospital" class="btn-submit" value="Update"><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

