<?php
  $status=['Initial','Processed','Processing','Rejected','Doctor confirmed'];
?>
<link rel="stylesheet" href= "./../../css/home.css">
<link rel="stylesheet" href= "./../../css/style.css">
<link rel="stylesheet" href= "./../../css/pagination.css">
<div class="containers">
<ul class="breadcrumb">
    <li><a href="./../medScruHome/index">Home</a></li>
    <li>Scrutinizer Pending cases queue</a></li>
  </ul>
  <h1>Scrutinizer Pending cases queue</h1>
  <div class="table-container">
    <table class="table-view">
    <tr>
        <th>ID</th>
        <th>Discharge Date</th>
        <th>Status</th>
        <th>Hospital</th>
        <th>Field Agent</th>
        <th>Med Scrutinizer</th>
        <th>Doctor</th>
        <th>Action</th>
      </tr>

      <tr class="filter-row" id="filter-row">
        <form action="./viewCase" method="get">
          <th id="filter-row">Filter >></th>
          <th id="filter-row" ><input name="dischargeDate" type="date" value=<?php echo $_GET['dischargeDate'];?>></th>
          <th id="filter-row" >
            <select name="status">
              <option value="">All</option>
              <?php
                foreach ($status as $state) {
                  echo "<option ".($_GET['status']==$state ? "selected":"")." value=\"".$state."\">". $state ."</option>";
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
          <th id="filter-row" >
            <select name="fag">
              <option value="">All</option>
              <?php
                foreach ($data['fagList'] as $fag) {
                  echo "<option ".($_GET['fag']==$fag['empID'] ? "selected":"")." value=\"".$fag['empID']."\">". $fag['empFirstName']." ". $fag['empLastName'] ."</option>";
                }
              ?>
            </select>  
          </th>
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
            <select name="doc">
              <option value="">All</option>
              <?php
                foreach ($data['docList'] as $doc) {
                  echo "<option ".($_GET['doc']==$doc['empID'] ? "selected":"")." value=\"".$doc['empID']."\">". $doc['empFirstName']." ". $doc['empLastName'] ."</option>";
                }
              ?>
            </select>
          </th>
          <th id="filter-row" >
            <input type="submit" class="btn-submit-filter" name="filter" value="Filter">
          </th>
        </form>
      </tr>
      <?php
      foreach($data['queue'] as $row){
        echo "<tr>"."<td>".$row['claimID']."</td>".
              "<td>".$row['dischargeDate']."</td>".
              "<td>".$row['caseStatus']."</td>".
              "<td>".$row['name']."</td>".
              "<td>".$row['fag']."</td>".
              "<td>".$row['med']."</td>".
              "<td>".$row['doc']."</td>".
              "<td><a class=\"editBtn\" href=\"./editCase?action=edit&id=".$row['claimID']."\">View/Edit</a> "."</td>"."</tr>";
      }

      ?>
        <!-- <td><a class="button" href="./../viewPendingCases/viewCase">Accept</a></td> -->
    </table>
    
    <div class="pagination">
      <?php
      $page= is_int((int)$_GET['page']) ? (int)$_GET['page'] :0;
       if(($page) != 0){
        echo "<a href=\"./viewCase?".
              "dischargeDate=".$_GET['dischargeDate']."&".
              "status=".$_GET['status']."&".
              "hospital=".$_GET['hospital']."&".
              "fag=".$_GET['fag']."&".
              "med=".$_GET['med']."&".
              "doc=".$_GET['doc']."&".
              "page=".($page-1)."\">&laquo;</a>";
       }
       
        $pageCount= ceil((((int)$data['pagination'])/10));
        // echo $pageCount;
        for($i=0; $i< $pageCount; $i++){
          $active = ($i==$page) ? "class=\"active\"":"" ;
          // echo $i;
          echo "<a href=\"./viewCase?".
                "dischargeDate=".$_GET['dischargeDate']."&".
                "status=".$_GET['status']."&".
                "hospital=".$_GET['hospital']."&".
                "fag=".$_GET['fag']."&".
                "med=".$_GET['med']."&".
                "doc=".$_GET['doc']."&".
                "page=".$i."\" ". $active. ">" . ($i+1) ."</a>";
        }
        if(($page+1) != $pageCount){
          echo "<a href=\"./viewCase?".
                "dischargeDate=".$_GET['dischargeDate']."&".
                "status=".$_GET['status']."&".
                "hospital=".$_GET['hospital']."&".
                "fag=".$_GET['fag']."&".
                "med=".$_GET['med']."&".
                "doc=".$_GET['doc']."&".
                "page=".($page+1)."\">&raquo;</a>";
        }
      ?>
    </div>
    
  </div>
</div>