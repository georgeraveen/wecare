<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>View Reports</h1><br>
    <div class="form-container">
      <h2>Review cases and feedback</h2>
    
      <form action="./reviewCasesFeedback" method="post">
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
            <label for="type">Type</label><br>
            <select id="type" name="type" required>
              <option>VIP</option>
              <option>Regular</option>
            </select><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <a class="btn-submit" href="./overPayments">Submit</a>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="containers">
    <div class="form-container">
      <h2>Employee performance report</h2>
    
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
            <label for="type">Type</label><br>
            <select id="type" name="type" required>
              <option>VIP</option>
              <option>Regular</option>
            </select><br>
          </div>
        </div>
        <div class="column">
          <div class="formInput">
            <a class="btn-submit" href="./employeePerformanceReport">Submit</a>
          </div>
        </div>
      </div>
    </div>
</div>