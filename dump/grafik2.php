<?php

include 'connect.php';

$test = array();
$count = 0;

$res = mysqli_query($link, "SELECT
COUNT(ID_Produk) AS 'Jumlah Penjualan', Nama_Produk
FROM
fakta_penjualan
GROUP BY
Nama_Produk
ORDER BY 
COUNT(ID_Produk) DESC
LIMIT 5;");
while ($row = mysqli_fetch_array($res)) {
  $test[$count]["label"] = $row["Nama_Produk"];
  $test[$count]["y"] = $row["Jumlah Penjualan"];
  $count = $count + 1;
}

?>

<!-- Lima Produk dengan penjualan terbanyak -->

<!DOCTYPE HTML>
<html>

<head>
  <script>
    window.onload = function() {

      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
          text: "Top 5 Produk Terjual"
        },
        axisY: {
          title: "Jumlah Terjual",
          valueFormatString: "###0.##",
          interval: 1000,
          includeZero: true
        },
        data: [{
          type: "column",
          yValueFormatString: "###0.## Produk",
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