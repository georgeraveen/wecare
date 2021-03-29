<link rel="stylesheet" href="./../../css/home.css">
<link rel="stylesheet" href="./../../css/style.css">
<div class="containers">
    <?php
    //var_dump($data['policyDetails'][0]['date']);
    ?>
    <ul class="breadcrumb">
        <li><a href="./../managerHome/index">Home</a></li>
        <li><a href="./index">View Policy List</a></li>
        <li>Manage Insurance Policy</a></li>
    </ul>
    <h1>New insurance policy</h1><br>
    <div class="form-container" style="width:60%">
        <form action="./updatePolicy" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="policyID">Policy ID</label><br>
                        <input type="text" id="policyID" name="policyID" class="input" readonly value="<?php echo $data['policyDetails'][0]['policyID'] ?>"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="date">Date</label><br>
                        <input type="Date" id="date" name="date" class="input" value="<?php echo $data['policyDetails'][0]['date'] ?>"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="remarks">Remark</label><br>
                        <input type="text" id="remarks" name="remarks" class="input" value="<?php echo $data['policyDetails'][0]['remarks'] ?>"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="vPremium">vPremium</label><br>
                        <input type="text" id="vPremium" name="vPremium" class="input" value="<?php echo $data['policyDetails'][0]['vPremium'] ?>"><br>
                    </div>
                </div>
                <div class="column">
                    <div class="formInput">
                        <label for="rPremium">rPremium</label><br>
                        <input type="text" id="rPremium" name="rPremium" class="input" value="<?php echo $data['policyDetails'][0]['rPremium'] ?>"><br>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="formInput">
                        <label for="policyFile">Upload</label>
                        <input type="file" id="policyFile" name="policyFile[]" multiple accept=".pdf, image/*">
                    </div>
                </div>
                <div class="column">
                    <input type="text" id="deleteFile" name="deleteFile" class="input hide" hidden>
                    <h4 for="policyFile">Policy Documents</h4>
                    <table>
                        <?php
                        try {
                            $dir = "./../documents/policy/" . $data['policyDetails'][0]['policyID'];
                            $ls = scandir($dir);

                            for ($i = 2; $i < count($ls); $i++) {
                                $filename = pathinfo($ls[$i], PATHINFO_FILENAME);
                                $ext = pathinfo($ls[$i], PATHINFO_EXTENSION);
                                echo "<tr id=\"file$i\">";
                                echo "<td><a id=\"txt-$i\" href =\"./viewFil/" . $data['policyDetails'][0]['policyID'] . "/" . $filename . "/" . $ext . "\">" . $ls[$i] . "</a></td>";
                                echo  "<td>  <div id=\"btn-$i\" class=\"btn-delete\" onClick=\"sendDelete($i)\"> X </div></td>";
                                echo "</tr>";
                            }
                        } catch (\Throwable $th) {
                            echo "Empty Directory";
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <div style="text-align:center" class="column">
                    <div class="formInput">
                        <br><br>
                        <input type="submit" id="submit" name="update" class="btn-submit" value="Submit"><br>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" src="./../../js/files.js"></script>