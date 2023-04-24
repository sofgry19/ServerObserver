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
        <div class="home-analytics">
          <div class="home-header2">
            <div class="home-logo">
              <img
                src="public/playground_assets/logo1i761-udzp-200h.png"
                alt="Logo1I761"
                class="home-logo1"
              />
            </div>
            <div class="home-tab-section">
              <div class="home-tab">
                <a href="../index.php"> <span class="home-text"><span>Dashboard</span></span></a>
              </div>
              <div class="home-tab1">
                <span class="home-text02"><span>Analytics</span></span>
              </div>
              <div class="home-tab2">
              <a href="../allclasses/index.php"><span class="home-text04"><span>All Classes</span></span></a>
              </div>
            </div>
            <div class="home-notif-acc-setting">
              <img
                src="public/playground_assets/logouti761-x0rg.svg"
                alt="logoutI761"
                class="home-logout"
              />
            </div>
          </div>
          <div class="home-frame97">
            <div class="home-widgets">
              <span class="home-text06"><span>Daily Log Errors</span></span>
              <?php 
                //we are connecting to graph php
                include("../../bargraphAdmin.php");
                ?>
              <!--we are making it less messy by seperating the code for graph in another php file. using 
              chart_div to display the graph. it will be easier to develop the graph as it is in seperate file. make it more neat
              and convinient.
              -->
              <div id="chart_div"></div>
            </div>
            <div class="home-widgets1">
              <div class="home-frame71">
                <span class="home-text08"><span>Logs</span></span>
                <div class="home-iste240">
                <form action="" method="post">
                    <label for="filters">Filter By:</label>

                    <select class="home-text17" name="filter" id="topproblems">
                      <option value="all">Show All</option>
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
                    src="public/playground_assets/polygon1i751-cc97.svg"
                    alt="Polygon1I751"
                    class="home-polygon1"
                  />
                </div>
              </div>
              <div class="home-logs">
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
              
                      $query = "SELECT * FROM logs"; // replace with your own table name
                      $notfound = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='404'";
                      $success = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='200'";
                      $password = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='401'";
                      $connection = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='408'";
                      $teapot = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='418'";
                      $vpn = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='502'";
                      $general = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='400'";
                      $toomany = "SELECT code, studentID, timestamp, request, classID FROM logs WHERE code='429'";

                      if(isset($_POST['filter'])){
                        $select1 = $_POST['filter'];
                        switch ($select1) {
                            case '404':
                              $stmt = $db->query($notfound);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case '200':
                              $stmt = $db->query($success);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case '401':
                              $stmt = $db->query($password);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case '408':
                              $stmt = $db->query($connection);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case '418':
                              $stmt = $db->query($teapot);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case 'all':
                              $stmt = $db->query($query);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case '502':
                              $stmt = $db->query($vpn);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case '400':
                              $stmt = $db->query($general);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case '429':
                              $stmt = $db->query($toomany);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            case 'all':
                              $stmt = $db->query($query);
                              $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                              break;
                            }
                         // Display the results
                         echo "<table>";
                         foreach($results as $row) {
                           echo "<tr>";
                           echo "<td>" . $row['studentID'] . "</td>";
                           echo "<td>" . $row['timestamp'] . "</td>";
                           echo "<td>" . $row['request'] . "</td>";
                           echo "<td>" . $row['code'] . "</td>";
                           echo "<td>" . $row['classID'] . "</td>";
                           echo "</tr>";
                         }
                         echo "</table>";
                        }
               ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
