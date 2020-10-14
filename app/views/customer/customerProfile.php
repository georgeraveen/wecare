
<link rel="stylesheet" href= "./../../css/CustStyle.css">
<img src="./../../images/undraw_personal_site_xyd1.svg" class="img-background">

<div class="profile-container">
  <form method="post">
    <div class="boxCard">
      <h2>View My Profile</h2>
      <h3>Full name goes here</h3>
      <h4>Email : <input type="email" id="email" name="email" class="input email"></h4>
      <h4>Birthday : </h4>
      <h4>Address : <textarea id="custAddress" name="custAddress" class="input address" rows="3"></textarea></h4>
      <h4>Contact : <input type="number" id="contact" name="contact" class="input contact"> <button type="button" onClick="addNumber()" class="btn-add" id="btn-add">Add</button></h4>
      <div id="contactList" class="contactList">

      </div>
      <h4>Payment Date : </h4>
      <h4>Type : </h4>
      <h4>Gender : </h4>
      <button type="button" class="btn-add" id="btn-add">View my policy</button>
      <input type="submit" id="updateDetails" name="updateDetails" class="btn-submit" value="Update Details"><br>
      
      <input hidden type="text" id="custContacts" name="custContact"  class="input hide"  ><br>
    </div>
  </form>
</div>
<!-- <div class="grid-container">
  
</div> -->


<script type="text/javascript" src="./../../js/customer.js"></script>
