<?php
 
 include 'connect.php';
 
 $test = array();
 $count = 0;
 
 $res = mysqli_query($link, "SELECT
 SUM(`Total Harga`) AS 'Jumlah Omset', Tgl_Pembelian_Nama_Bulan AS Bulan
FROM
 fakta_penjualan
WHERE
 Tgl_Pembelian >= '2003-01-01' AND Tgl_Pembelian < '2004-01-01'
GROUP BY
 Tgl_Pembelian_Nama_Bulan
ORDER BY
 Tgl_Pembelian_No_Bulan;");
 while($row=mysqli_fetch_array($res)) {
   $test[$count]["label"]=$row["Bulan"];
   $test[$count]["y"]=$row["Jumlah Omset"];
   $count=$count+1;
 }
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Omset Penjualan Tiap Bulan pada Tahun 2003"
	},
	axisY: {
		title: "Jumlah Omset",
		valueFormatString: "$#,##0.##",
		includeZero: true
	},
	data: [{
		type: "line",
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