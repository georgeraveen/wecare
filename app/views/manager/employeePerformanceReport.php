<link rel="stylesheet" href="./../../css/home.css">
<link rel="stylesheet" href="./../../css/style.css">
<div class="containers">
  <ul class="breadcrumb">
    <li><a href="./../managerHome/index">Home</a></li>
    <li><a href="./index">View Reports</a></li>
    <li>View Medical Scrutinizer Performance</a></li>
  </ul>
  <h1>Medical scrutinizer performance report </h1><br>
  <div class="table-container">
    <table class="table-view">
      <tr>
        <th>Med Scrutinizer ID</th>
        <th>No of cases</th>
        <th>Name</th>
      </tr>
      <?php
      $chartData = [];
      $chartLabel = [];
      $chartBackColor = [];
      $r = 0;
      $g = 100;
      $b = 70;
      foreach ($data as $row) {
        //echo "gyff";
        $r += 50;
        $g += 20;
        $b += 30;
        array_push($chartBackColor, "rgba($r,$g,$b,1)");
        array_push($chartData, $row['num']);
        array_push($chartLabel, $row['empName']);
        echo "<tr>" . "<td>" . $row['medScruID'] . "</td>" .
          "<td>" . $row['num'] . "</td>" .
          "<td>" . $row['empName'] . "</td>" . "</tr>";
      }
      //var_dump($chartData);
      ?>
    </table>

  </div>
  <br><br><br>
  <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
      datasets: [{
        data: <?php echo json_encode($chartData) ?>,
        backgroundColor: <?php echo json_encode($chartBackColor) ?>,
        // backgroundColor: [
        //   'rgba(75, 192, 192, 0.2)',
        //   'rgba(153, 102, 255, 0.2)',
        //   'rgba(255, 159, 64, 0.2)'
        // ],
        // borderColor: [
        //   'rgba(75, 192, 192, 1)',
        //   'rgba(153, 102, 255, 1)',
        //   'rgba(255, 159, 64, 1)'
        // ]
      }],

      borderWidth: 1,
      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: <?php echo json_encode($chartLabel) ?>,
    },

    // Configuration options go here
    options: {}
  });
</script>