<?php

// Replace these variables with your own database credentials
$db_host = 'localhost';
$db_name = 'sdg3149';
$db_user = 'sdg3149';
$db_pass = 'Troika3%kipling';

// Create a new database connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database to retrieve the code descriptions and number of codes, grouped by code


$sql = "SELECT 
            CASE 
                WHEN code = 404 THEN 'Resource Not Found'
                WHEN code = 401 THEN 'Incorrect Credentials'
                WHEN code = 408 THEN 'Connectivity'
                WHEN code = 418 THEN 'Teapot'
                WHEN code = 502 THEN 'No VPN'
                WHEN code = 429 THEN 'Too Many Requests'
                ELSE code
            END AS code_desc, 
            COUNT(*) AS count 
        FROM logs WHERE code NOT IN (200, 300) 
        GROUP BY code_desc";

$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Create an array to store the data for the chart
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[$row["code_desc"]] = $row["count"];
    }
    
    // Output the data as a pie chart using Google Charts API
    echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>";
    echo "<script type='text/javascript'>";
    echo "google.charts.load('current', {'packages':['corechart']});";
    echo "google.charts.setOnLoadCallback(drawChart);";
    echo "function drawChart() {";
    echo "var data = google.visualization.arrayToDataTable([";
    echo "['Code', 'Number of Codes'],";

    foreach ($data as $code_desc => $count) {
        echo "['" . $code_desc . "', " . $count . "],";
    }
    
    echo "]);";
    echo "var options = {";
    echo "'title': 'Number of Codes',";
    echo "'width': 430,";
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
