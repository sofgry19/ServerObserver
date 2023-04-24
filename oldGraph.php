<?php

// Replace these variables with your own database credentials
$db_host = 'localhost';
$db_name = 'sa4825';
$db_user = 'sa4825';
$db_pass = 'Congregate3^house-proud';

// Create a new database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database to retrieve the number of codes and group by code
$sql = "SELECT code, COUNT(*) AS count FROM Logs GROUP BY code";

$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Create an array to store the data for the chart
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[$row["code"]] = $row["count"];
    }
    
    // Output the data as a pie chart using Google Charts API
    echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
    echo "<script type='text/javascript'>";
    echo "google.charts.load('current', {'packages':['corechart']});";
    echo "google.charts.setOnLoadCallback(drawChart);";
    echo "function drawChart() {";
    echo "var data = google.visualization.arrayToDataTable([";
    echo "['Code', 'Number of Codes'],";

    foreach ($data as $code => $count) {
        echo "['" . $code . "', " . $count . "],";
    }
    
    echo "]);";
    echo "var options = {";
    echo "'title': 'Number of Codes',";
    echo "'width': 400,";
    echo "'height': 400,";
    echo "};";
    echo "var chart = new google.visualization.PieChart(document.getElementById('chart_div'));";
    echo "chart.draw(data, options);";
    echo "}";
    echo "</script>";
    echo "<div id='chart_div'></div>";
} else {
    echo "No results found.";
}

// Close the database connection
$conn->close();

?>




<div id="chart_div"></div>
