<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/fa-icon.svg" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/aside.css">
    <link rel="stylesheet" href="asset/css/main.css">
    <title>Pendapatan Tahun 2001</title>
</head>

<body>

    <main>
        <?php include 'component/aside.php' ?>
        <div class="content">
            <div class="buttonOpt">
                <ul>
                    <li>
                        <a href="pendapatanTahun2001.php">Pendapatan Tahun 2001</a>
                    </li>
                    <li>
                        <a href="pendapatanTahun2002.php">Pendapatan Tahun 2002</a>
                    </li>
                    <li>
                        <a href="pendapatanTahun2003.php">Pendapatan Tahun 2003</a>
                    </li>
                    <li>
                        <a href="pendapatanTahun2004.php">Pendapatan Tahun 2004</a>
                    </li>
                    <li>
                        <a href="omsetPertahun.php">Omset Pertahun</a>
                    </li>
                </ul>
            </div>
            <div class="content-chart">
                <?php include 'chart-pendapatanTahun2001.php'; ?>
            </div>
        </div>
    </main>


    <script>

    </script>
</body>

</html>