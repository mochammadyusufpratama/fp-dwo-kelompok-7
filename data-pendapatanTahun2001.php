<?php

include 'connect.php';

$test_1 = array();
$count_1 = 0;

$res_1 = mysqli_query(
    $link,
    "SELECT
        SUM(`Total Harga`) AS 'Jumlah Omset', Tgl_Pembelian_Nama_Bulan AS Bulan
    FROM
        fakta_penjualan
    WHERE
        Tgl_Pembelian >= '2001-07-01' AND Tgl_Pembelian < '2002-01-01'
    GROUP BY
        Tgl_Pembelian_Nama_Bulan
    ORDER BY
        Tgl_Pembelian_No_Bulan;"
);

while ($row = mysqli_fetch_array($res_1)) {
    $test_1[$count_1]["label"] = $row["Bulan"];
    $test_1[$count_1]["y"] = $row["Jumlah Omset"];
    $count_1 = $count_1 + 1;
}

$json_data_1 = json_encode($test_1);

$data_1 = json_decode($json_data_1, true);
