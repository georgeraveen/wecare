<?php
var_dump($data);
// var_dump($data['singleCaseDetails']);
?>
<link rel="stylesheet" href= "./../../css/custStyle.css">
<img src="./../../images/undraw_personal_site_xyd1.svg" class="img-background">

<div class="profile-container">
  <form method="post" action="./updateCustDeatails">
    <div class="boxCard">
      <h2>View My Profile</h2>
      <h3><?php echo $data[0]["custName"]?></h3>
      <h4>Email : <input type="email" id="email" name="email" class="input email" value="<?php echo $data[0]["email"]?>"></h4>
      <h4>Birthday : <?php echo $data[0]["custDOB"]?></h4>
      <h4>Address : <textarea id="custAddress" name="custAddress" class="input address" rows="3"><?php echo $data[0]['custAddress'] ?></textarea></h4>
      <h4>Contact :<input type="number" id="contact" name="contact" class="input contact" value="<?php echo $data[0]["custContactNo"]?> "> <button type="button" onClick="addNumber()" class="btn-add" id="btn-add">Add</button></h4>
      <div id="contactList" class="contactList">

      </div>
      <h4>Payment Date :<?php echo $data[0]["paymentDate"]?> </h4>
      <h4>Type : <?php echo $data[0]["type"]?></h4>
      <h4>Gender :<?php echo $data[0]["gender"]?> </h4>
      <button type="button" class="btn-add" id="btn-add">View my policy</button>
      <input type="submit" id="updateDetails" name="updateDetails" class="btn-submit" value="Update Details"><br>
      
      <input hidden type="text" id="custContacts" name="custContact"  class="input hide"  ><br>
    </div>
  </form>
</div>
<!-- <div class="grid-container">
  
</div> -->


<script type="text/javascript" src="./../../js/customer.js"></script>
