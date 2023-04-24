

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
                alt="LogoI112"
                src="public/playground_assets/logoi112-uj6k-200h.png"
                class="home-logo1"
              />
              <img
                alt="Line45I112"
                src="public/playground_assets/line45i112-98h.svg"
                class="home-line45"
              />
              <span class="home-text">
                <span class="home-text01">
                  <span>GCCIS</span>
                  <br />
                  <span></span>
                </span>
                <span>Solace</span>
              </span>
            </div>
            <div class="home-tab-section">
              <div class="home-tab">
                <span class="home-text06"><span>Dashboard</span></span>
                <img
                  alt="Line46I112"
                  src="public/playground_assets/line46i112-du6l.svg"
                  class="home-line46"
                />
              </div>
            </div>
            <div class="home-notif-acc-setting">
              <img
                alt="personFILL1wght700GRAD0opsz481I112"
                src="public/playground_assets/personfill1wght700grad0opsz481i112-cnlu.svg"
                class="home-person-f-i-l-l1wght700g-r-a-d0opsz481"
              />
              <a href='logout.php'><?php session_name("session"); session_start(); $_SESSION["username"] ?>
              <img
                alt="settingsFILL1wght700GRAD0opsz481I112"
                src="public/playground_assets/settingsfill1wght700grad0opsz481i112-adg8.svg"
                class="home-settings-f-i-l-l1wght700g-r-a-d0opsz481"
              />
            </a>
            </div>
          </div>
          <div class="home-section">
            <div class="home-widgets">
              <div class="home-title">
                <span class="home-text08"><span>Section Summary</span></span>
                <img
                  alt="tripledotsI184"
                  src="public/playground_assets/tripledotsi184-lgsg.svg"
                  class="home-tripledots"
                />
              </div>
              <div class="home-chart">
                <div class="home-pie-chart">
                  <div class="home-group3">
                    <img
                      alt="Ellipse1I184"
                      src="public/playground_assets/ellipse1i184-7aq.svg"
                      class="home-ellipse1"
                    />
                    <img
                      alt="Ellipse2I184"
                      src="public/playground_assets/ellipse2i184-qhvm-400w.png"
                      class="home-ellipse2"
                    />
                    <img
                      alt="Ellipse3I184"
                      src="public/playground_assets/ellipse3i184-9m4-400w.png"
                      class="home-ellipse3"
                    />
                  </div>
                  <div class="home-legend">
                    <img
                      alt="Rectangle7I184"
                      src="public/playground_assets/rectangle7i184-688s-200h.png"
                      class="home-rectangle7"
                    />
                    <span class="home-text10">ISTE.240.01</span>
                    <img
                      alt="Rectangle8I184"
                      src="public/playground_assets/rectangle8i184-15ga-200h.png"
                      class="home-rectangle8"
                    />
                    <span class="home-text11"><span>ISTE.240.02</span></span>
                    <img
                      alt="Rectangle9I184"
                      src="public/playground_assets/rectangle9i184-3jhq-200h.png"
                      class="home-rectangle9"
                    />
                    <span class="home-text13"><span>ISTE.240.03</span></span>
                  </div>
                </div>
                <div class="home-dropdown">
                  <div class="home-unsuccessful-logins">
                    <span class="home-text15">
                      <span>Unsuccessful Logins</span>
                    </span>
                    <img
                      alt="Polygon1I184"
                      src="public/playground_assets/polygon1i184-wy2.svg"
                      class="home-polygon1"
                    />
                  </div>
                  <div class="home-i-s-t-e240">
                    <span class="home-text17"><span>ISTE 240</span></span>
                    <img
                      alt="Polygon1I184"
                      src="public/playground_assets/polygon1i184-cpfh.svg"
                      class="home-polygon11"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="home-widgets1">
              <div class="home-heading">
                <span class="home-text19"><span>Top Problem Areas</span></span>
                <div class="home-filter">
                  <span class="home-text21"><span>Filter</span></span>
                  <img
                    alt="Polygon1I193"
                    src="public/playground_assets/polygon1i193-eiri.svg"
                    class="home-polygon12"
                  />
                </div>
              </div>
              <div class="home-section1">
                <span class="home-text23"><span>Classes</span></span>
                <div class="home-class-structure">
                  <div class="home-widgets-class-tab">
                    <div class="home-frame73">
                      <div class="home-frame74">
                        <span class="home-text25">
                          <span>ISTE.xxx.01</span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="home-widgets-class-tab1">
                    <div class="home-frame731">
                      <div class="home-frame741">
                        <span class="home-text27">
                          <span>ISTE.xxx.01</span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="home-section2">
                <div class="home-title1">
                  <span class="home-text29"><span>Students</span></span>
                </div>
                <div class="home-logs">
                <?php

// Replace these variables with your own database credentials
$host = "localhost";
$username = "sa4825";
$password = "Congregate3^house-proud";
$database = "sa4825";

// Create a new database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Query the database to retrieve the data from the Logs table, grouping by the code column
$notfound = "SELECT code, StudentID, date, request, referer, useragent, classID FROM logs WHERE code='404'";
$success = "SELECT code, StudentID, date, request, referer, useragent, classID FROM logs WHERE code='200'";

$result = mysqli_query($conn, $notfound);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  // Output the data in a table
  echo "<table>";
  echo "<tr><th>Error</th><th>StudentID</th><th>Request</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>Request Not Found</td><td>" . $row["StudentID"] . "</td><td>" . $row["request"] . "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

// Close the database connection
mysqli_close($conn);

?>
                </div>
              </div>
            </div>
          </div>
          <div class="home-section3">
            <div class="home-widgets2">
              <div class="home-frame71">
                <span class="home-text45"><span>Logs</span></span>
                <div class="home-group9">
                  <div class="home-group8">
                    <div class="home-frame100">
                      <span class="home-text47">!</span>
                    </div>
                    <span class="home-text48"><span>5 Alerts</span></span>
                  </div>
                  <img
                    alt="tripledotsI184"
                    src="public/playground_assets/tripledotsi184-njpm.svg"
                    class="home-tripledots1"
                  />
                </div>
              </div>
              <div class="home-logs1">
				<span class="home-text50">
        <?php
				// Connect to the database
				$db_host = 'localhost'; // replace with your database host
				$db_name = 'sa4825'; // replace with your database name
				$db_user = 'sa4825'; // replace with your database username
				$db_pass = 'Congregate3^house-proud'; // replace with your database password

				try {
					$db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
				} catch(PDOException $ex) {
					echo "Failed to connect to the database: " . $ex->getMessage();
					exit;
				}

				// Query the database
				$query = "SELECT * FROM logs "; // replace with your own table name
				$stmt = $db->query($query);
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
				// Display the results
				echo "<table>";
				foreach($results as $row) {
					echo "<tr>";
					echo "<td>" . $row['StudentID'] . "</td>";
					echo "<td>" . $row['date'] . "</td>";
					echo "<td>" . $row['request'] . "</td>";
					echo "<td>" . $row['code'] . "</td>";
					echo "<td>" . $row['referer'] . "</td>";
					echo "<td>" . $row['useragent'] . "</td>";
					echo "<td>" . $row['classID'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
				?>
			</span>
              </div>
            </div>
            <div class="home-widgets3">
              <div class="home-frame711">
                <div class="home-group7">
                  <span class="home-text65"><span>Classes</span></span>
                  <div class="home-i-s-t-e2401">
                    <span class="home-text67"><span>Filter</span></span>
                    <img
                      alt="Polygon1I184"
                      src="public/playground_assets/polygon1i184-5s9i.svg"
                      class="home-polygon13"
                    />
                  </div>
                </div>
                <div class="home-group81">
                  <div class="home-frame99">
                    <img
                      alt="personFILL1wght700GRAD0opsz481I184"
                      src="public/playground_assets/personfill1wght700grad0opsz481i184-8nca.svg"
                      class="home-person-f-i-l-l1wght700g-r-a-d0opsz4811"
                    />
                  </div>
                  <span class="home-text69"><span>126 Students</span></span>
                  <img
                    alt="tripledotsI184"
                    src="public/playground_assets/tripledotsi184-c48c.svg"
                    class="home-tripledots2"
                  />
                </div>
              </div>
              <div class="home-class-structure1">
                <div class="home-widgets-class-tab2">
                  <div class="home-frame732">
                    <div class="home-frame742">
                      <span class="home-text71"><span>ISTE.xxx.01</span></span>
                    </div>
                  </div>
                </div>
                <div class="home-widgets-class-tab3">
                  <div class="home-frame733">
                    <div class="home-frame743">
                      <span class="home-text73"><span>ISTE.xxx.01</span></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="home-class-structure2">
                <div class="home-widgets-class-tab4">
                  <div class="home-frame734">
                    <div class="home-frame744">
                      <span class="home-text75"><span>ISTE.xxx.01</span></span>
                    </div>
                  </div>
                </div>
                <div class="home-widgets-class-tab5">
                  <div class="home-frame735">
                    <div class="home-frame745">
                      <span class="home-text77"><span>ISTE.xxx.01</span></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="home-class-structure3">
                <div class="home-widgets-class-tab6">
                  <div class="home-frame736">
                    <div class="home-frame746">
                      <span class="home-text79"><span>ISTE.xxx.01</span></span>
                    </div>
                  </div>
                </div>
                <div class="home-widgets-class-tab7">
                  <div class="home-frame737">
                    <div class="home-frame747">
                      <span class="home-text81"><span>ISTE.xxx.01</span></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
