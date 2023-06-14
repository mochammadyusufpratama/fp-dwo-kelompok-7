<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/fa-icon.svg" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/aside.css">
    <link rel="stylesheet" href="asset/css/main.css">
    <title>Olap Mondrian</title>
</head>

<body>

    <main>
        <?php include 'component/aside.php' ?>
        <div class="content">
            <div class="content-chart">
                <h2>Tampilan Olap Mondrian Adventure Works</h2>
                <iframe name="mondrian" src="http://localhost:8080/mondrian/testpage.jsp?query=dwoadw" width="100%" height="500" style="border: none; padding: 0;"></iframe>
            </div>
        </div>
    </main>

    <script>

    </script>
</body>

</html>