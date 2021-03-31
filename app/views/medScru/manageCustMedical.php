
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
    <ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li><a href="./../manageCustMedical/index">Manage medical details of customers</a></li>
    <li>Select customer</a></li>
    </ul>
  <h1>Customer past medical history</h1><br>
  <h2 style="text-align:center">Select customer by entering customer ID</h2><br>
  <div class="form-container2">
  <form action="./viewConditions" method="post">
    <div class="row">
              <div class="column" style="flex:25%">
              <div class="formInput">
                <input type="number" id="customer" name="customerID" class="input" value="" required>
                </div>
              </div>
              <!-- <div class="column"style="flex:50%">
                <div class="formInput">
                  <input type="text" id="custNameBox" name="custName" class="input"  onkeyup="showResult(this.value)" placeholder="Search by customer ID"><br>
                  <div id="livesearch" class="dropdown-content"></div>
                </div>
              </div> -->
              <div class="column"style="flex:25%">
              <input type="submit" id="addMedCondition" name="addMedCondition" class="btn-submit" value="View Medical records"><br>
              </div> 

      </div> 

  </div>



  