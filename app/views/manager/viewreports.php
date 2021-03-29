<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../managerHome/index">Home</a></li>
    <li>View Reports</a></li>
</ul>
  <h1>View Reports</h1><br>
    <div class="form-container">
      <h2>Review cases and feedback</h2>
    
      <form action="./reviewCasesFeedback" method="post">
        <div class="row">
          <div class="column">
              <div class="formInput">
                <label for="fromDate">From date</label><br>
                <input type="Date" id="fromDate" name="fromDate" class="input" required value=""><br>
              </div>
          </div>
          <div class="column">
              <div class="formInput">
                <label for="toDate">To date</label><br>
                <input type="Date" id="toDate" name="toDate" class="input" required value=""><br>
              </div>
          </div>
          <div class="column">
            <div class="formInput">
              <label for="type">Type</label><br>
              <select id="type" name="type" required>
                <option>VIP</option>
                <option>Regular</option>
              </select><br>
            </div>
          </div>
          <div class="column">
              <div class="formInput">
                  <input type="submit" id="reviewCases" name="reviewCases" class="btn-submit" value="Submit"><br>
              </div>
          </div>
        </div>
      </form>
    </div>
</div>
<div class="containers">
    <div class="form-container">
      <h2>Over payments</h2>
      <form action="./overPayments" method="post">
        <div class="row">
          <div class="column">
              <div class="formInput">
                <label for="fromDate">From date</label><br>
                <input type="Date" id="fromDate" name="fromDate" class="input" required value=""><br>
              </div>
          </div>
          <div class="column">
              <div class="formInput">
                <label for="toDate">To date</label><br>
                <input type="Date" id="toDate" name="toDate" class="input" required value=""><br>
              </div>
          </div>
          <div class="column">
              <div class="formInput">
                  <input type="submit" id="overPaid" name="overPaid" class="btn-submit" value="Submit"><br>
              </div>
          </div>
        </div>
      </form>
    </div>
</div>
<div class="containers">
    <div class="form-container">
      <h2>Medical Scrutinizer performance report</h2>
      <form action="./employeePerformanceReport" method="post">
        <div class="row">
          <div class="column">
              <div class="formInput">
                <label for="fromDate">From date</label><br>
                <input type="Date" id="fromDate" name="fromDate" class="input" value=""><br>
              </div>
          </div>
          <div class="column">
              <div class="formInput">
                <label for="toDate">To date</label><br>
                <input type="Date" id="toDate" name="toDate" class="input" value=""><br>
              </div>
          </div>
          <div class="column">
            <div class="formInput">
                <input type="submit" id="performance" name="performance" class="btn-submit" value="Submit"><br>
            </div>
          </div>
        </div>
      </form>
    </div>
</div>