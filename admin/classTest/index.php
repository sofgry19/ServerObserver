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
      <?php $id = $_GET['id']; ?>
      <link href="./home.css" rel="stylesheet" />

      <div class="home-container">
        <div class="home-professor-classes">
          <div class="home-header3">
            <div class="home-logo">
              <img
                src="public/playground_assets/logo1i231-ksd-200h.png"
                alt="Logo1I231"
                class="home-logo1"
              />
            </div>
            <div class="home-tab-section">
              <div class="home-tab">
                <a href="../index.php"> <span class="home-text"><span>Dashboard</span></span> </a>
              </div>
              <div class="home-tab1">
              <a href="../classes/index.php"> <span class="home-text002"><span>Classes</span></span> </a>
                <img
                  src="public/playground_assets/line46i231-v7qf.svg"
                  alt="Line46I231"
                  class="home-line46"
                />
              </div>
            </div>
            <div class="home-notif-acc-setting">
            <a href='../logout.php'><?php session_name("session"); session_start(); $_SESSION["username"] ?>
              <img
                src="public/playground_assets/logouti231-bhd.svg"
                alt="logoutI231"
                class="home-logout"
              />
            </a>
            </div>
          </div>
          <div class="home-widgets">
            <div class="home-frame71">
              <div class="home-group10">
                <span class="home-text004"><span><?php  
                      $db_host = 'localhost'; // replace with your database host
                      $db_name = 'sdg3149'; // replace with your database name
                      $db_user = 'sdg3149'; // replace with your database username
                      $db_pass = 'Troika3%kipling';
                      $studentcount = 0;
                        try {
                          $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
                        } catch(PDOException $ex) {
                          echo "Failed to connect to the database: " . $ex->getMessage();
                          exit;
                        }

                      $count = "SELECT COUNT(DISTINCT(studentID)) FROM logs WHERE classID=$id";
                      $stmt = $db->query($count);
                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      foreach($results as $row => $r){
                        foreach($r as $value){
                          $studentcount = $value;
                        }
                      }
              
                      $classlist = "SELECT class FROM classlist WHERE classid='$id'";
                      $stmt = $db->query($classlist);
                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      $resultsarr = [];
                      foreach($results as $row => $r){
                        foreach($r as $value){
                          array_push($resultsarr, $value);
                        } 
                      }
                      echo $resultsarr[0];
                    ?></span></span>
              </div>
              <div class="home-group8">
                <div class="home-group5">
                  <div class="home-frame99">
                    <img
                      src="public/playground_assets/personfill1wght700grad0opsz481i231-wo1n.svg"
                      alt="personFILL1wght700GRAD0opsz481I231"
                      class="home-person-fill1wght700grad0opsz481"
                    />
                  </div>
                  <span class="home-text006"><span><?php echo $studentcount?> Students</span></span>
                </div>
              </div>
            </div>
            <img
              src="public/playground_assets/line50i231-r5es.svg"
              alt="Line50I231"
              class="home-line50"
            />
            
            <div class="home-frame112">
              <span class="home-text008"><span>Name</span></span>
              <span class="home-text010"><span>Username</span></span>
              <span class="home-text012"><span>Successful Logins</span></span>
              <span class="home-text014"><span>Unsuccessful Logins</span></span>
              <span class="home-text016"><span>Flagged Logins</span></span>
              <span class="home-text018"><span>Last Login</span></span>
            </div>
            <img
              src="public/playground_assets/line51i231-3nzt.svg"
              alt="Line51I231"
              class="home-line51"
            />
            <?php for($i = 0; $i < $studentcount; $i++): ?>

            <div class="home-frame107">
              <img
                src="public/playground_assets/profilei231-gzur.svg"
                alt="ProfileI231"
                class="home-profile"
              />
              <div class="home-frame113">
                <div class="home-frame11">
                  <span class="home-text020"><span><?php 
                  $firstname = "SELECT firstname FROM studentinfo 
                  RIGHT JOIN logs
                  ON logs.studentID = studentinfo.studentID
                  WHERE logs.classID=$id
                  GROUP BY firstname, lastname";
                  $stmt = $db->query($firstname);
                  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $firstarr = [];
                  foreach($results as $row => $r){
                    foreach($r as $value){
                      array_push($firstarr, $value);
                    } 
                  }

                  $lastname = "SELECT lastname FROM studentinfo 
                  RIGHT JOIN logs
                  ON logs.studentID = studentinfo.studentID
                  WHERE logs.classID=$id
                  GROUP BY firstname, lastname";
                  $stmt = $db->query($lastname);
                  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $lastarr = [];
                  foreach($results as $row => $r){
                    foreach($r as $value){
                      array_push($lastarr, $value);
                    } 
                  }

                  echo "$firstarr[$i] $lastarr[$i]";
                  ?></span></span>
                  <span class="home-text022"><span><?php 
                  $username = "SELECT DISTINCT studentID FROM logs WHERE classID=$id";
                  $stmt = $db->query($username);
                  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $resultsarr = [];
                  foreach($results as $row => $r){
                    foreach($r as $value){
                      array_push($resultsarr, $value);
                    } 
                  }
                  echo $resultsarr[$i];?>
                  </span></span>
                </div>
                <div class="home-group11">
                  <span class="home-text024">
                    <?php 
                      $succesful = "SELECT COUNT(code) FROM logs WHERE (code=200 OR code=300) AND studentID='$resultsarr[$i]'";
                      $stmt = $db->query($succesful);
                      $count = $stmt->fetchColumn();
                      echo $count;
                    ?>
                  </span>
                  <span class="home-text025">
                    <?php 
                      $username = "SELECT COUNT(code) FROM logs WHERE (code=401 or code=404 or code=408) AND studentID='$resultsarr[$i]'";
                      $stmt = $db->query($username);
                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      $resultsarr = [];
                      foreach($results as $row => $r){
                        foreach($r as $value){
                          array_push($resultsarr, $value);
                        } 
                      }
                      echo $resultsarr[0];
                    ?>
                  </span>
                </div>
                <div class="home-group12">
                  <span class="home-text026">0</span>
                  <span class="home-text027">
                    <span>
                      <?php 
                        $username = "SELECT timestamp FROM logs WHERE classID=$id";
                        $stmt = $db->query($username);
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $resultsarr = [];
                        foreach($results as $row => $r){
                          foreach($r as $value){
                            array_push($resultsarr, $value);
                          } 
                        }
                        echo $resultsarr[$i];
                      ?>
                    </span>
                  </span>
                </div>
              </div>
            </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
