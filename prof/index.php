<!DOCTYPE html>
<html lang="en">
  <head>
    <title>RIT Server Observer</title>
    <meta property="og:title" content="RIT Server Observer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta property="twitter:card" content="summary_large_image" />

    <style data-tag="reset-style-sheet">
      html {  line-height: 1.15;}body {  margin: 0;}* {  box-sizing: border-box;  border-width: 0;  border-style: solid;}p,li,ul,pre,div,h1,h2,h3,h4,h5,h6,figure,blockquote,figcaption {  margin: 0;  padding: 0;}button {  background-color: transparent;}button,input,optgroup,select,textarea {  font-family: inherit;  font-size: 100%;  line-height: 1.15;  margin: 0;}button,select {  text-transform: none;}button,[type="button"],[type="reset"],[type="submit"] {  -webkit-appearance: button;}button::-moz-focus-inner,[type="button"]::-moz-focus-inner,[type="reset"]::-moz-focus-inner,[type="submit"]::-moz-focus-inner {  border-style: none;  padding: 0;}button:-moz-focus,[type="button"]:-moz-focus,[type="reset"]:-moz-focus,[type="submit"]:-moz-focus {  outline: 1px dotted ButtonText;}a {  color: inherit;  text-decoration: inherit;}input {  padding: 2px 4px;}img {  display: block;}html { scroll-behavior: smooth  }
    </style>
    <style data-tag="default-style-sheet">
      html {
        font-family: Inter;
        font-size: 16px;
      }

      body {
        font-weight: 400;
        font-style:normal;
        text-decoration: none;
        text-transform: none;
        letter-spacing: normal;
        line-height: 1.15;
        color: var(--dl-color-gray-black);
        background-color: var(--dl-color-gray-white);

      }
    </style>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
      data-tag="font"
    />
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <div>
      <link href="./home.css" rel="stylesheet" />

      <div class="home-container">
        <div class="home-professor-dashboard">
          <div class="home-header3">
            <div class="home-logo">
              <img
                alt="Logo1I112"
                src="public/playground_assets/logo1i112-lzkj-200h.png"
                class="home-logo1"
              />
            </div>
            <div class="home-tab-section">
              <div class="home-tab">
                <span class="home-text"><span>Dashboard</span></span>
                <img
                  alt="Line46I112"
                  src="public/playground_assets/line46i112-bi3.svg"
                  class="home-line46"
                />
              </div>
              <div class="home-tab1">
               <a href="classes/index.php"> <span class="home-text02"><span>Classes</span></span> </a>
               <img
                  alt="Line46I112"
                  src="public/playground_assets/line46i112-bi3.svg"
                  class="home-line46"
                />
              </div>
              <div class="home-tab2">
               <a href="help/index.php"> <span class="home-text02"><span>Help Form</span></span> </a>
              </div>
            </div>
            <div class="home-notif-acc-setting">
              <a href='logout.php'><?php session_name("session"); session_start(); $_SESSION["username"] ?>
                <img
                  alt="logoutI112"
                  src="public/playground_assets/logouti112-1pmd.svg"
                  class="home-logout"
                />
              </a>
            </div>
          </div>
          <div class="home-section">
            <div class="home-widgets">
              <div class="home-title">
                <span class="home-text04">Section Summary</span>
              </div>
              <div class="home-chart">
              <?php 
                //we are connecting to graph php
                include("../bargraph.php");
                ?>
              <!--we are making it less messy by seperating the code for graph in another php file. using 
              chart_div to display the graph. it will be easier to develop the graph as it is in seperate file. make it more neat
              and convinient.
              -->
              <div id="chart_div"></div>
                
              </div>
            </div>
            <div class="home-widgets1">
              <div class="home-heading">
                <span class="home-text15"><span>Top Problem Areas</span></span>
                <div class="home-filter">
                  <form action="" method="post">
                    <label for="filters">Filter By:</label>

                    <select class="home-text17" name="filter" id="topproblems">
                      <option value="404">Resource Not Found</option>
                      <option value="400">General Client-Side Error</option>
                      <option value="401">Incorrect Credientials</option>
                      <option value="408">Connectivity</option>
                      <option value="418">Easter Egg</option>
                      <option value="502">No VPN</option>
                      <option value="429">Too Many Requests</option>
                    </select> 
                    <input type="submit" name="submit" value="Go"/>
                </form>
                  <img
                    alt="Polygon1I193"
                    src="public/playground_assets/polygon1i193-d7u.svg"
                    class="home-polygon12"
                  />
                </div>
              </div>
              <div class="home-section1">
                <span class="home-text19"><span>Classes</span></span>
                 <div class="home-class-structure">
                        <?php
                        $db_host = 'localhost'; // replace with your database host
                        $db_name = 'sdg3149'; // replace with your database name
                        $db_user = 'sdg3149'; // replace with your database username
                        $db_pass = 'Troika3%kipling';
                          try {
                            $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                          } catch(PDOException $ex) {
                            echo "Failed to connect to the database: " . $ex->getMessage();
                            exit;
                          }
                      $profid = $_SESSION["userid"];
                      $classlist = "SELECT classID, class FROM classlist WHERE profID=$profid";
                      $classidlist = "SELECT classID FROM classlist WHERE profID=$profid";
                      $stmt = $db->query($classlist);
                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      $stmt2 = $db->query($classidlist);
                      $idresults = $stmt2->fetchAll(PDO::FETCH_ASSOC);
          
                      $resultsarr = [];
                      $i =0;
                          foreach($results as $row => $r){
                              array_push($resultsarr, $r["class"]);  
                              //var_dump($r["classID"]);        
                              echo "<div class='home-single-class'>
                              <div class='home-frame73'>
                                <div class='home-frame74'>
                                  <a href='classTest/index.php?id={$r["classID"]}'>
                                  <span class='home-text21'>". $r["class"]."</span></div></div></div></a>";
                                  $i++;
                                  if($i==3) break;
                          }
                    ?>
                </div>
              </div>
              <div class="home-section2">
                <div class="home-title1">
                  <span class="home-text27"><span>Students</span></span>
                </div>
                <div class="home-logs">
                  <?php

                    // Replace these variables with your own database credentials
                    $host = "localhost";
                    $username = "sdg3149";
                    $password = "Troika3%kipling";
                    $database = "sdg3149";

                    // Create a new database connection
                    $conn = mysqli_connect($host, $username, $password, $database);

                    // Check if the connection was successful
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }

                    // Query the database to retrieve the data from the Logs table, grouping by the code column
                    $notfound = "SELECT studentID, code, timestamp, request, classID, CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                    WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className FROM logs WHERE code='404' AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                    $success = "SELECT studentID, code, timestamp, request, classID, CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                    WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className FROM logs WHERE code='200'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                    $password = "SELECT studentID, code, timestamp, request, classID, CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                    WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className FROM logs WHERE code='401'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                    $connection = "SELECT studentID, code, timestamp, request, classID, CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                    WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className FROM logs WHERE code='408'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                    $teapot = "SELECT studentID, code, timestamp, request, classID, CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                    WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className FROM logs WHERE code='418'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                    $vpn = "SELECT studentID, code, timestamp, request, classID, CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                    WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className FROM logs WHERE code='502'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                    $general = "SELECT studentID, code, timestamp, request, classID, CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                    WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className FROM logs WHERE code='400'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                    $toomany = "SELECT studentID, code, timestamp, request, classID, CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                    WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className FROM logs WHERE code='429'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                    
                    if(isset($_POST['filter'])){
                      $select1 = $_POST['filter'];
                      switch ($select1) {
                          case '404':
                            $result = mysqli_query($conn, $notfound);

                            // Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>Resource Not Found</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }
        
                            // Close the database connection
                            mysqli_close($conn);
                              break;
                          case '200':
                            $result = mysqli_query($conn, $success);

                            // Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>Success</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }
        
                            // Close the database connection
                            mysqli_close($conn);
                              break;
                          case '401':
                            $result = mysqli_query($conn, $password);

                            // Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>Incorrect Credientials</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }
        
                            // Close the database connection
                            mysqli_close($conn);
                              break;
                          case '408':
                            $result = mysqli_query($conn, $connection);

                            // Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>Connection Issue</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }
                            // Close the database connection
                            mysqli_close($conn);
                              break;
                          case '418':
                            $result = mysqli_query($conn, $teapot);

                            // Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>Teapot!</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }
        
                            // Close the database connection
                            mysqli_close($conn);
                              break;
                          case '502':
                            $result = mysqli_query($conn, $vpn);

                            /// Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>No VPN</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }
        
                            // Close the database connection
                            mysqli_close($conn);
                              break;
                          case '400':
                            $result = mysqli_query($conn, $general);

                            // Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>Client-Side Error</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }

                            // Close the database connection
                            mysqli_close($conn);
                              break;
                          case '429':
                            $result = mysqli_query($conn, $toomany);

                            // Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>Too Many Requests</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }
        
                            // Close the database connection
                            mysqli_close($conn);
                              break;
                          default:
                              # code...
                              break;
                      }
                  }
                    ?>
                </div>
              </div>
            </div>
          </div>
          <div class="home-section3">
            <div class="home-widgets2">
              <div class="home-frame71">
                <span class="home-text43"><span>Logs</span></span>
                <div class="home-iste2401">
                <form action="" method="post">
                    <label for="filters">Filter By:</label>

                    <select class="home-text45" name="logfilter" id="topproblems">
                      <option value="all">All Logs</option>
                      <option value="404">Resource Not Found</option>
                      <option value="400">General Client-Side Error</option>
                      <option value="401">Incorrect Credientials</option>
                      <option value="408">Connectivity</option>
                      <option value="418">Easter Egg</option>
                      <option value="502">No VPN</option>
                      <option value="429">Too Many Requests</option>
                    </select> 
                    <input type="submit" name="submit" value="Go"/>
                </form>
                  <img
                    alt="Polygon1I184"
                    src="public/playground_assets/polygon1i184-jth.svg"
                    class="home-polygon13"
                  />
                </div>
              </div>
              <div class="home-logs1">
                <?php 
                    $db_host = 'localhost'; // replace with your database host
                    $db_name = 'sdg3149'; // replace with your database name
                    $db_user = 'sdg3149'; // replace with your database username
                    $db_pass = 'Troika3%kipling';
                      try {
                        $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                      } catch(PDOException $ex) {
                        echo "Failed to connect to the database: " . $ex->getMessage();
                        exit;
                      }
              
                      $query = "SELECT code, studentID, timestamp, request, classID, CASE WHEN code = 404 THEN 'Resource Not Found'
                      WHEN code = 401 THEN 'Incorrect Credentials' WHEN code = 408 THEN 'Connectivity Issues' ELSE 'N/A' END AS Error,
                      CASE WHEN classID= 1 THEN 'Web and Mobile 1' WHEN classID= 2 THEN 'Web and Mobile 2' WHEN classID= 3 THEN 'Client Programming'
                      WHEN classID= 4 THEN 'Server Programming' WHEN classID= 5 THEN 'Software Design' ELSE 'N/A' END AS className
                      FROM logs WHERE code NOT IN (200, 300) AND classID in (SELECT classID from classlist WHERE profID=$profid)"; // replace with your own table name
                      $notfound = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='404'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $success = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='200'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $password = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='401'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $connection = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='408'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $teapot = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='418'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $vpn = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='502'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $general = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='400'AND classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $toomany = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='429'AND classID in (SELECT classID from classlist WHERE profID=$profid)";

                      if(isset($_POST['logfilter'])){
                        $select1 = $_POST['logfilter'];
                        switch ($select1) {
                          case 'all':
                            $result = mysqli_query($conn, $query);

                            // Check if any rows were returned
                            if (mysqli_num_rows($result) > 0) {
                              // Output the data in a table
                              echo "<table>";
                              echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . $row["Error"] . "</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                              }
                              echo "</table>";
                            } else {
                              echo "No results found.";
                            }
        
                            // Close the database connection
                            mysqli_close($conn);
                              break;
                            case '404':
                              $result = mysqli_query($conn, $notfound);
  
                              // Check if any rows were returned
                              if (mysqli_num_rows($result) > 0) {
                                // Output the data in a table
                                echo "<table>";
                                echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td>Resource Not Found</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                                }
                                echo "</table>";
                              } else {
                                echo "No results found.";
                              }
          
                              // Close the database connection
                              mysqli_close($conn);
                                break;
                            case '200':
                              $result = mysqli_query($conn, $success);
  
                              // Check if any rows were returned
                              if (mysqli_num_rows($result) > 0) {
                                // Output the data in a table
                                echo "<table>";
                                echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td>Success</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                                }
                                echo "</table>";
                              } else {
                                echo "No results found.";
                              }
          
                              // Close the database connection
                              mysqli_close($conn);
                                break;
                            case '401':
                              $result = mysqli_query($conn, $password);
  
                              // Check if any rows were returned
                              if (mysqli_num_rows($result) > 0) {
                                // Output the data in a table
                                echo "<table>";
                                echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td>Wrong Password</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                                }
                                echo "</table>";
                              } else {
                                echo "No results found.";
                              }
          
                              // Close the database connection
                              mysqli_close($conn);
                                break;
                            case '408':
                              $result = mysqli_query($conn, $connection);
  
                              // Check if any rows were returned
                              if (mysqli_num_rows($result) > 0) {
                                // Output the data in a table
                                echo "<table>";
                                echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td>Connection Issue</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                                }
                                echo "</table>";
                              } else {
                                echo "No results found.";
                              }
                              // Close the database connection
                              mysqli_close($conn);
                                break;
                            case '418':
                              $result = mysqli_query($conn, $teapot);
  
                              // Check if any rows were returned
                              if (mysqli_num_rows($result) > 0) {
                                // Output the data in a table
                                echo "<table>";
                                echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td>Teapot!</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                                }
                                echo "</table>";
                              } else {
                                echo "No results found.";
                              }
          
                              // Close the database connection
                              mysqli_close($conn);
                                break;
                            case '502':
                              $result = mysqli_query($conn, $vpn);
  
                              /// Check if any rows were returned
                              if (mysqli_num_rows($result) > 0) {
                                // Output the data in a table
                                echo "<table>";
                                echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td>No VPN</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                                }
                                echo "</table>";
                              } else {
                                echo "No results found.";
                              }
          
                              // Close the database connection
                              mysqli_close($conn);
                                break;
                            case '400':
                              $result = mysqli_query($conn, $general);
  
                              // Check if any rows were returned
                              if (mysqli_num_rows($result) > 0) {
                                // Output the data in a table
                                echo "<table>";
                                echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td>Client-Side Error</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                                }
                                echo "</table>";
                              } else {
                                echo "No results found.";
                              }
  
                              // Close the database connection
                              mysqli_close($conn);
                                break;
                            case '429':
                              $result = mysqli_query($conn, $toomany);
  
                              // Check if any rows were returned
                              if (mysqli_num_rows($result) > 0) {
                                // Output the data in a table
                                echo "<table>";
                                echo "<tr><th>Error</th><th>StudentID</th><th>Request</th><th>Class ID</th></tr>";
                                while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr><td>Too Many Requests</td><td>" . $row["studentID"] . "</td><td>" . $row["request"] . "</td><td>" . $row["className"] . "</td></tr>";
                                }
                                echo "</table>";
                              } else {
                                echo "No results found.";
                              }
          
                              // Close the database connection
                              mysqli_close($conn);
                                break;
                            default:
                                # code...
                                break;
                        }
                    }
                      ?>
              </div>
            </div>
            <div class="home-widgets3">
              <div class="home-frame711">
                <div class="home-group7">
                  <span class="home-text65"><span>Classes</span></span>
                  <div class="home-iste2402">
                    <img
                      alt="Polygon1I184"
                      src="public/playground_assets/polygon1i184-1qff.svg"
                      class="home-polygon14"
                    />
                  </div>
                </div>
                <div class="home-group8">
                  <div class="home-group5">
                    <div class="home-frame99">
                      <img
                        alt="personFILL1wght700GRAD0opsz481I184"
                        src="public/playground_assets/personfill1wght700grad0opsz481i184-u8zg.svg"
                        class="home-person-fill1wght700grad0opsz481"
                      />
                    </div>
                    <span class="home-text69">
                    <?php
                      $count = "SELECT COUNT(DISTINCT(studentID)) FROM logs WHERE classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $stmt = $db->query($count);
                      $countresults = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      foreach($countresults as $row => $r){
                        foreach($r as $value){
                          echo " $value Students";
                        }
                        
                      }
                    ?>
                    </span>
                  </div>
                </div>
              </div>
             <div class="home-class-structure1">
                      <?php 
                       $profid = $_SESSION["userid"];
                       $classlist = "SELECT classID, class FROM classlist WHERE profID=$profid";
                       $classidlist = "SELECT classID FROM classlist WHERE profID=$profid";
                       $stmt = $db->query($classlist);
                       $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      foreach($results as $row => $r){
                          echo "<a href='classTest/index.php?id={$r["classID"]}'> <div class='home-single-class3'> 
                      <div class='home-frame733'>
                        <div class='home-frame743'>
                          <span class='home-text71'>" . $r["class"] . "</span></div></div></div></a>"; 
                      }
                      ?>
              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>