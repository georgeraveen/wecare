
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
  <h1>Add New Medical Condition for "**cust**" </h1><br>
  <div class="form-container2">
    
    <form action="./back/backend.php" method="post">
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="medDate">Date</label><br>
            <input type="Date" id="medDate" name="medDate" class="input" value="" required><br>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="type">Type</label><br>
            <select id="type" name="type" required>
              <option value=a>a</option>
              <option value=b>b</option>
              <option value=c>c</option>
              <option value=d>d</option>
            </select><br>
          </div>
          
        </div>
      </div>
     
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="healthCondition">Health Condition</label><br>
            <textarea id="healthCondition" name="healthCondition" class="commentBox"></textarea> <br>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="column">
          <div class="formInput">
            <label for="comments">Comments</label><br>
            <textarea id="comments" name="comments" class="commentBox"></textarea> <br>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="column">
          <div class="formInput">
            <input type="submit" id="addMedCondition" name="addMedCondition" class="btn-submit" value="Add medical condition"><br>
            
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
