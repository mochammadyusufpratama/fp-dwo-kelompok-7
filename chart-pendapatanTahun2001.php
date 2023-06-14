<?php include 'data-pendapatanTahun2001.php' ?>

<canvas id="myChart" height="450px" width="900px"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var jsonData_1 = <?php echo json_encode($test_1); ?>;

    var labels_1 = [];
    var dataset_1 = [];

    for (var i = 0; i < jsonData_1.length; i++) {
        labels_1.push(jsonData_1[i].label);
        dataset_1.push(parseInt(jsonData_1[i].y));
    }

    const data = {
        labels: labels_1,
        datasets: [{
            label: 'Data Penjualan Tahun 2001',
            backgroundColor: 'rgb(0,123,255, 0.2)',
            borderColor: 'rgb(0,123,255)',
            data: dataset_1,
            pointBorderWidth: 1,
            pointBorderColor: '#dc3545',
            pointRadius: 7,
            pointHoverRadius: 10,
            borderWidth: 4,
            fill: true
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';

                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += new Intl.NumberFormat('en-US', {
                                    style: 'currency',
                                    currency: 'USD'
                                }).format(context.parsed.y);
                            }
                            return label;
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Pendapatan Tahun 2001',
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
                    max: 5000000,
                    ticks: {
                        stepSize: 1000000,
                        callback: (value, index, values) => {
                            return new Intl.NumberFormat('en-US', {
                                style: 'currency',
                                currency: 'USD',
                                maximumSignificantDigits: 3
                            }).format(value)
                        }
                    },
                    beginAtZero: true
                }
            }
        }
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>