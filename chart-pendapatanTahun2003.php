<?php include 'data-pendapatanTahun2003.php' ?>

<canvas id="myChart" height="350px" width="700px"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var jsonData = <?php echo json_encode($test); ?>;

    var labels = [];
    var dataset = [];

    for (var i = 0; i < jsonData.length; i++) {
        labels.push(jsonData[i].label);
        dataset.push(parseInt(jsonData[i].y));
    }

    const data = {
        labels: labels,
        datasets: [{
            label: 'Data Penjualan Tahun 2003',
            backgroundColor: 'rgb(0,123,255, 0.2)',
            borderColor: 'rgb(0,123,255)',
            data: dataset,
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
                    text: 'Pendapatan Tahun 2003',
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
                    max: 9000000,
                    ticks: {
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