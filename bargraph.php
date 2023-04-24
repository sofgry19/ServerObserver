<?php
// Set database information
$db_host = 'localhost';
$db_name = 'sdg3149';
$db_user = 'sdg3149';
$db_pass = 'Troika3%kipling';

// Connect to the database
$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

// Get the current date and time in the correct format for MySQL
$current_time = date('Y-m-d H:i:s');

// Calculate the date and time 24 hours ago in the correct format for MySQL
$last_24_hours = date('Y-m-d H:i:s', strtotime('-24 hours'));

$profid =     $_SESSION["userid"];

// Query the database to get the number of records with each code in the last 24 hours
$stmt = $conn->prepare("
    SELECT 
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
    FROM logs
    WHERE code NOT IN (200, 300) AND timestamp BETWEEN '$last_24_hours' AND '$current_time' AND classID in (SELECT classID from classlist WHERE profID=$profid)
    GROUP BY code_desc
    ORDER BY count DESC
");

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Create an array of labels and an array of data for the chart
$labels = [];
$data = [];
foreach ($results as $result) {
    $labels[] = $result['code_desc'];
    $data[] = $result['count'];
}

// Convert the arrays to JSON format for use in the chart
$labels_json = json_encode($labels);
$data_json = json_encode($data);
?>

<!-- HTML code for the chart -->
<div style="width: 600px; padding-left: 80px;">
    <canvas id="chart"></canvas>
</div>

<!-- JavaScript code to create the chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= $labels_json ?>,
        datasets: [{
            label: 'Number of records in Last 24 hours',
            data: <?= $data_json ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
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
</script>
