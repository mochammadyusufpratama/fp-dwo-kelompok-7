<?php

include 'connect.php';

$test = array();
$count = 0;

$res_2 = mysqli_query(
    $link,
    "SELECT
        SUM(`Total Harga`) AS 'Jumlah Omset', Tgl_Pembelian_Nama_Bulan AS Bulan
    FROM
        fakta_penjualan
    WHERE
        Tgl_Pembelian >= '2004-01-01' AND Tgl_Pembelian < '2004-08-01'
    GROUP BY
        Tgl_Pembelian_Nama_Bulan
    ORDER BY
        Tgl_Pembelian_No_Bulan;"
);

while ($row = mysqli_fetch_array($res_2)) {
    $test[$count]["label"] = $row["Bulan"];
    $test[$count]["y"] = $row["Jumlah Omset"];
    $count = $count + 1;
}

$json_data = json_encode($test);

$data = json_decode($json_data, true);
