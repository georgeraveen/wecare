<link rel="stylesheet" href="./../../css/home.css">
<link rel="stylesheet" href="./../../css/style.css">
<div class="containers">
    <ul class="breadcrumb">
        <li><a href="./../managerHome/index">Home</a></li>
        <li>Manage weekly roster</li>
    </ul>
    <h1>Manage weekly roster</h1><br>
    <div class="form-container2">
        <form action="./viewRoster">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="rosterDate">Date</label><br>
                        <input type="Date" id="rosterDate" name="rosterDate" class="input" value="" placeholder="New roster date"><br>
                    </div>
                </div>

                <div class="column">
                    <select id="rostID" name="rostID" required>
                        <?php
                        foreach ($data as $value) {
                            echo "<option value=\"" . $value["rosterID"] . "\">" . $value["rosterID"] . " - " . $value["date"] . " - MGR" . $value["managerID"] . "</option>";
                        }
                        ?>
                    </select><br>
                </div>

            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <!-- <input type="submit" id="createDate" name="addMed" class="btn-submit" value="Add New"><br> -->
                        <a class="btn-submit" href="./createNew">Add New</a>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="viewRoster" name="viewRoster" class="btn-submit" value="View/Update"><br>
                        <!-- <a class="btn-submit" href="./viewRoster">View/Update</a> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br><br>


</div>