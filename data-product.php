<?php

include 'connect.php';

$test_1 = array();
$count_1 = 0;

$res_1 = mysqli_query(
    $link,
    "SELECT
        COUNT(ID_Produk) AS 'Jumlah Penjualan', Nama_Produk
    FROM
        fakta_penjualan
    GROUP BY
        Nama_Produk
    ORDER BY 
        COUNT(ID_Produk) DESC
    LIMIT 5;"
);

while ($row = mysqli_fetch_array($res_1)) {
    $test_1[$count_1]["label"] = $row["Nama_Produk"];
    $test_1[$count_1]["y"] = $row["Jumlah Penjualan"];
    $count_1 = $count_1 + 1;
}

$json_data_1 = json_encode($test_1);

$data_1 = json_decode($json_data_1, true);
