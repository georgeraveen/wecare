<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../managerHome/index">Home</a></li>
    <li>Create new employee Profile</a></li>
</ul>
  <h1>Create new employee Profile</h1><br>
    <div class="form-container">

        <form action="./createEmployee" method="post">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empFirstName">First Name</label><br>
                        <input type="text" id="empFirstName" name="empFirstName" required class="input"><br>
                    </div>
                
                    <div class="formInput">
                        <label for="empLastName">Last Name</label><br>
                        <input type="text" id="empLastName" name="empLastName" required class="input"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="empAddress">Address</label><br>
                        <textarea id="empAddress" name="empAddress" class="commentBox"></textarea> <br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empNIC">NIC</label><br>
                        <input type="text" id="empNIC" name="empNIC" required class="input"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="empTypeID">Role</label><br>
                        <select id="empTypeID" name="empTypeID" required onChange="roleChange(this)">
                            <option value="DEO">DEO</option>
                            <option value="DOC">DOC</option>
                            <option value="FAG">FAG</option>
                            <option value="MED">MED</option>
                            <option value="MGR">MGR</option>
                        </select><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" class="input"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="gender">Gender</label><br>
                        <select id="gender" name="gender" required>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empContactNo">Contact numbers</label><br>
                        <input type="text" id="empContactNo" name="empContactNo" required class="input" placeholder="Enter numbers with comma seperated"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput" hidden>
                        <label id="empSpLabel" for="empSp">Option</label><br>
                        <input type="text" id="empSp" name="empSp" required class="input" ><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="empDOB">Date of birth</label><br>
                        <input type="Date" id="empDOB" name="empDOB" class="input" value="" required><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="newEmployee" name="newEmployee" class="btn-submit" value="Create Account"><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="./../../js/manager.js"></script>
