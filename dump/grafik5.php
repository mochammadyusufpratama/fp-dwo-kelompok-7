<?php

include 'connect.php';

$test = array();
$count = 0;

$res = mysqli_query($link, "SELECT
Negara, SUM(`Total Harga`) AS 'Jumlah Omset'
FROM
fakta_penjualan
WHERE
Tgl_Pembelian >= '2001-07-01' AND Tgl_Pembelian < '2004-08-01' AND Negara IS NOT NULL
GROUP BY
Negara
ORDER BY
SUM(`Total Harga`) DESC
LIMIT 5;");
while ($row = mysqli_fetch_array($res)) {
  $test[$count]["label"] = $row["Negara"];
  $test[$count]["y"] = $row["Jumlah Omset"];
  $count = $count + 1;
}

?>

<!-- Lima Negara dengan Omset Tertinggi -->

<!DOCTYPE HTML>
<html>

<head>
  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
          text: "Negara dengan Omset Tertinggi"
        },
        axisY: {
          title: "Jumlah Omset",
          valueFormatString: "$#,##0.##",
          includeZero: true
        },
        data: [{
          type: "column",
          yValueFormatString: "$#,##0.##",
          dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
        }]
      });
      chart.render();
    }
  </script>
</head>

<body>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
  <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>