<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Scrutinizer Completed queue</h1>
  <h2>Please select the date range</h2>

  <div class="form-container2">
    <form>
      <div class="row">
        <div class="column">
        <div class="formInput">
  <label for="fromDate">From:</label>
  <input type="date" id="fromDate" name="From">
        </div>
        </div>
        <div class="column">
        <div class="formInput"> 
  <label for="toDate">To:</label>
  <input type="date" id="toDate" name="To">
        </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
        <div class="formInput">  
         <input type="submit" value="Submit">
        </div>
        </div>
        <div class="column"> 
        <!-- -->
        </div>
      </div>
    </form>
  </div>



  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Claim ID</th>
        <th>Customer Name</th>
        <th>Mobile No.</th>
        <th>Type</th>
        <th>Date of admission</th>
        <th>Hospital</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <tr>
        <td>1</td>
        <td>Mr.Perera</td>
        <td>0771231231</td>
        <td>VIP</td>
        <td>2020/10/02</td>
        <td>Navaloka</td>
        <td>Completed</td>
        <td><a class="button" href="./../viewCompletedCases/reviewCase">Review Case</a></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Mr.Dammika</td>
        <td>02463244</td>
        <td>Regular</td>
        <td>2020/12/02</td>
        <td>Durdens</td>
        <td>Completed</td>
        <td><a class="button" href="./../viewCompletedCases/reviewCase">Review Case</a></td>
      </tr>

 
    </table>
    
  </div>
</div>