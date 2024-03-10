<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Visualization</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <h1>Data Visualization</h1>
    
    <!-- Container for the charts -->
    <div style="display: flex; justify-content: space-around;">

        <!-- Line Chart -->
        <canvas id="lineChart" width="400" height="200"></canvas>

        <!-- Bar Chart -->
        <canvas id="barChart" width="400" height="200"></canvas>

        <!-- Pie Chart -->
        <canvas id="pieChart" width="400" height="200"></canvas>

    </div>

    <!-- Include your JavaScript file -->
    <script src="graph_script.js"></script>
</body>
