<?php

include 'connect.php';

$test_1 = array();
$count_1 = 0;

$res_1 = mysqli_query(
    $link,
    "SELECT 
        Negara, SUM(`Total Harga`) AS 'Jumlah Omset'
    FROM 
        fakta_penjualan 
    WHERE 
        Tgl_Pembelian >= '2001-07-01' AND Tgl_Pembelian < '2004-08-01' AND Negara IS NOT NULL 
    GROUP BY 
        Negara 
    ORDER BY 
        SUM(`Total Harga`) DESC 
    LIMIT 5;
    "
    // "SELECT
    //     Negara, SUM(`Total Harga`) AS 'Jumlah Omset'
    // FROM
    //     fakta_penjualan
    // WHERE
    //     Tgl_Pembelian >= '2001-07-01' AND Tgl_Pembelian < '2004-08-01' AND Negara IS NOT NULL
    // GROUP BY
    //     Negara
    // ORDER BY
    //     SUM(`Total Harga`) DESC
    // LIMIT 5;"
);

while ($row = mysqli_fetch_array($res_1)) {
    $test_1[$count_1]["label"] = $row["Negara"];
    $test_1[$count_1]["y"] = $row["Jumlah Omset"];
    $count_1 = $count_1 + 1;
}

$json_data_1 = json_encode($test_1);

$data_1 = json_decode($json_data_1, true);
