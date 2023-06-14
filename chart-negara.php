<?php include 'data-negara.php' ?>

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
            label: 'Top Lima Negara',
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
            locale: 'en-US',
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
                    text: 'Top Lima Negara dengan Omset Tinggi',
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
                    max: 100000000,
                    ticks: {
                        callback: (value, index, values) => {
                            return new Intl.NumberFormat('en-US', {
                                style: 'currency',
                                currency: 'USD',
                                maximumSignificantDigits: 3
                            }).format(value)
                        }
                    }
                },
            }
        }
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>