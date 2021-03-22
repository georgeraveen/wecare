<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../dataEntryHome/index">Home</a></li>
    <li><a href="./../promotions/addNew">Add new promotion</a></li>
  </ul>
  <h1>Add new promotion</h1><br>
    <div class="form-container">
        <form action="./addPromotion" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="date">Date</label><br>
                        <input type="Date" id="date" name="date" class="input" required><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="type">Type</label><br>
                        <select id="type" name="type" required>
                            <option value="VIP">VIP</option>
                            <option value="Regular">Regular</option>
                        </select><br>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="fileToUpload">Upload Image</label>
                        <input type="file" id="fileToUpload" name="fileToUpload" accept="image/*">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="promo" name="promo" class="btn-submit" value="Add"><br>
                    </div>
                </div>
            </div> 
        </form>
    </div>
</div>

