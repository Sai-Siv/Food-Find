document.addEventListener('DOMContentLoaded', fetchData);

function fetchData() {
    // Fetch data from the PHP script
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            // Process the retrieved data
            console.log(data);

            // Render the charts using Chart.js
            renderLineChart(data);
            renderBarChart(data);
            renderPieChart(data);
        })
        .catch(error => console.error('Error:', error));
}

function renderLineChart(data) {
    var ctx = document.getElementById('lineChart').getContext('2d');

    // Extract X and Y data from the received data
    var labels = data.map(entry => entry.x_column);
    var values = data.map(entry => entry.y_column);

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Y Values',
                data: values,
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function renderBarChart(data) {
    var ctx = document.getElementById('barChart').getContext('2d');

    // Extract X and Y data from the received data
    var labels = data.map(entry => entry.x_column);
    var values = data.map(entry => entry.y_column);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Y Values',
                data: values,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

function renderPieChart(data) {
    var ctx = document.getElementById('pieChart').getContext('2d');

    // Extract X and Y data from the received data
    var labels = data.map(entry => entry.x_column);
    var values = data.map(entry => entry.y_column);

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                ],
                borderColor: 'white',
                borderWidth: 2
            }]
        }
    });
}