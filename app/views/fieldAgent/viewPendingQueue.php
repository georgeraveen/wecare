
<?php
  $status=['Initial','Processed','Processing','Rejected','Doctor confirmed'];
?>


<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/pagination.css">


<div class="containers">
    <h1>My pending queue</h1><br>
    <div class="table-container">
        <table class="table-view">
        <tr>
            <th>Claim ID</th>
            <th>Customer ID</th>
            <th>Date</th>
            <th>Med. Scrutinizer</th>
            <th>Hospital</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            <tr class="filter-row" id="filter-row">
                <form action="./index" method="get">
                <th id="filter-row">Filter >></th>
                <th id="filter-row" ><input name="custID" type="number" value=<?php echo $_GET['custID'];?>></th>
                <th id="filter-row" ><input name="admitDate" type="date" value=<?php echo $_GET['admitDate'];?>></th>
                <th id="filter-row" >
                    <select name="med">
                    <option value="">All</option>
                    <?php
                        foreach ($data['medList'] as $med) {
                        echo "<option ".($_GET['med']==$med['empID'] ? "selected":"")." value=\"".$med['empID']."\">". $med['empFirstName']." ". $med['empLastName'] ."</option>";
                        }
                    ?>
                    </select>
                </th>
                <th id="filter-row" >
                    <select name="hospital">
                    <option value="">All</option>
                    <?php
                        foreach ($data['hospList'] as $hospital) {
                        echo "<option ".($_GET['hospital']==$hospital['hospitalID'] ? "selected":"")." value=\"".$hospital['hospitalID']."\">". $hospital['name'] ."</option>";
                        }
                    ?>
                    </select>
                </th>
                <th id="filter-row"></th>
                <th id="filter-row" >
                    <input type="submit" class="btn-submit-filter" name="filter" value="Filter">
                </th>
                </form>
            </tr>
 <?php
        foreach($data['queue'] as $row){
            echo "<tr>"."<td>".$row['claimID']."</td>".
                "<td id=\"custID-".$row['claimID']."\">".$row['custID']."</td>".
                "<td id=\"admitDate-".$row['claimID']."\">".$row['admitDate']."</td>".
                "<td  id=\"name-".$row['claimID']."\">".$row['medSrcName']."</td>".
                "<td  id=\"name-".$row['claimID']."\">".$row['name']."</td>".
                "<td  id=\"status-".$row['claimID']."\">".$row['caseStatus']."</td>".
                "<td>  <a class=\"editBtn\" href=\"./editCase?action=edit&id=".$row['claimID']."\">View</a> "."</td>"."</tr>";
         }
         

?>
        </table>
        <div class="pagination">
            <?php
            $page= is_int((int)$_GET['page']) ? (int)$_GET['page'] :0;
            if(($page) != 0){
                echo "<a href=\"./index?".
                    "custID=".$_GET['custID']."&".
                    "admitDate=".$_GET['admitDate']."&".
                    "med=".$_GET['med']."&".
                    "hospital=".$_GET['hospital']."&".
                    "page=".($page-1)."\">&laquo;</a>";
            }
            
                $pageCount= ceil((((int)$data['pagination'])/10));
                // echo $pageCount;
                for($i=0; $i< $pageCount; $i++){
                $active = ($i==$page) ? "class=\"active\"":"" ;
                // echo $i;
                echo "<a href=\"./index?".
                        "custID=".$_GET['custID']."&".
                        "admitDate=".$_GET['admitDate']."&".
                        "med=".$_GET['med']."&".
                        "hospital=".$_GET['hospital']."&".
                        "page=".$i."\" ". $active. ">" . ($i+1) ."</a>";
                }
                if(($page+1) != $pageCount){
                echo "<a href=\"./index?".
                        "custID=".$_GET['custID']."&".
                        "admitDate=".$_GET['admitDate']."&".
                        "med=".$_GET['med']."&".
                        "hospital=".$_GET['hospital']."&".
                        "page=".($page+1)."\">&raquo;</a>";
                }
            ?>
        </div>
    </div>
</div>
