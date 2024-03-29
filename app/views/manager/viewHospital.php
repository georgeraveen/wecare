<link rel="stylesheet" href="./../../css/home.css">
<link rel="stylesheet" href="./../../css/style.css">
<div class="containers">
    <ul class="breadcrumb">
        <li><a href="./../managerHome/index">Home</a></li>
        <li>View Hospitals</a></li>
    </ul>
    <h1>Hospitals</h1><br>
    <div class="form-container">

        <form action="./newHospital" method="post">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="name">Hospital Name</label><br>
                        <input type="text" id="name" name="name" required class="input"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="hospitalContactNo">Contact Number</label><br>
                        <input type="text" id="hospitalContactNo" name="hospitalContactNo" required class="input"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="address">Address</label><br>
                        <textarea id="address" name="address" class="commentBox"></textarea> <br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <input type="submit" id="newHospital" name="newHospital" class="btn-submit" value="Submit"><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br><br>
    <div style="width : 80%" class="table-container">
        <table class="table-view">
            <tr>
                <th>Hospital Name</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th colspan="2" style="text-align:center">Action</th>
            </tr>
            <?php
            foreach ($data as $row) {
                echo "<tr>" . "<td>" . $row['name'] . "</td>" .
                    "<td>" . $row['hospitalContactNo'] . "</td>" .
                    "<td>" . $row['address'] . "</td>" .
                    "<td> <a class=\"deleteBtn\" href=\"./deleteHospital?action=delete&id=" . $row['hospitalID'] . "\">Delete</a> " . "</td>" .
                    "<td> <a class=\"editBtn\" href=\"./editHospital?action=edit&id=" . $row['hospitalID'] . "\">Edit</a> " . "</td>" . "</tr>";
            }
            ?>
        </table>
    </div>