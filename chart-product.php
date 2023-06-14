<?php include 'data-product.php' ?>

<canvas id="myChart" height="400px" width="700px"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var jsonData = <?php echo json_encode($test_1); ?>;

    console.log(jsonData);
    var labels = [];
    var dataset = [];

    for (var i = 0; i < jsonData.length; i++) {
        labels.push(jsonData[i].label);
        dataset.push(parseInt(jsonData[i].y));
    }

    const data = {
        labels: labels,
        datasets: [{
            label: 'Top Lima Product',
            backgroundColor: [
                'rgb(0,123,255, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: 'rgb(0,123,255)',
            data: dataset,
            pointBorderWidth: 1,
            pointBorderColor: '#dc3545',
            pointRadius: 7,
            pointHoverRadius: 10,
            borderWidth: 1,
            fill: true
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Top Lima Penjualan Product',
                    align: 'start',
                    font: {
                        size: 20,
                        family: 'Montserrat',
                        lineHeight: 2,
                    }
                },
                customCanvasBackgroundColor: {
                    color: 'white',
                },
                legend: {
                    position: 'bottom',
                }
            },
            scales: {
                y: {
                    max: 5000
                }
            }
        }
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>