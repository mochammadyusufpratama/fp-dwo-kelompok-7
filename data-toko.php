<?php

include 'connect.php';

$test_1 = array();
$count_1 = 0;

$res_1 = mysqli_query(
    $link,
    "SELECT
        COUNT(id_penjualan) AS 'Jumlah Penjualan', toko
    FROM
        fakta_penjualan
    WHERE
        toko IS NOT NULL
    GROUP BY
        toko
    ORDER BY
        COUNT(id_penjualan) DESC
    LIMIT 5;"
);

while ($row = mysqli_fetch_array($res_1)) {
    $test_1[$count_1]["label"] = $row["toko"];
    $test_1[$count_1]["y"] = $row["Jumlah Penjualan"];
    $count_1 = $count_1 + 1;
}

$json_data_1 = json_encode($test_1);

$data_1 = json_decode($json_data_1, true);
