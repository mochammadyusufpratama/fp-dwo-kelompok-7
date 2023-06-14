<?php

include 'connect.php';

$test = array();
$count = 0;

$res = mysqli_query($link, "SELECT
COUNT(id_penjualan) AS 'Jumlah Penjualan', toko
FROM
fakta_penjualan
WHERE
toko IS NOT NULL
GROUP BY
toko
ORDER BY
COUNT(id_penjualan) DESC
LIMIT 5;");
while ($row = mysqli_fetch_array($res)) {
  $test[$count]["label"] = $row["toko"];
  $test[$count]["y"] = $row["Jumlah Penjualan"];
  $count = $count + 1;
}

?>

<!-- Lima Toko dengan Penjualan terbanyak -->

<!DOCTYPE HTML>
<html>

<head>
  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
          text: "Top 5 Penjualan Toko Berdasarkan Transaksi"
        },
        axisY: {
          title: "Jumlah Transaksi",
          interval: 100,
          includeZero: true
        },
        data: [{
          type: "column",
          yValueFormatString: "#,##0.## Transaksi",
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