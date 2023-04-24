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
        <div class="home-professor-classes">
          <div class="home-header3">
            <div class="home-logo">
              <img
                src="public/playground_assets/logo1i227-ereb-200h.png"
                alt="Logo1I227"
                class="home-logo1"
              />
            </div>
            <div class="home-tab-section">
              <div class="home-tab">
              <a href="../index.php"> <span class="home-text"><span>Dashboard</span></span> </a>
              </div>
              <div class="home-tab1">
                <span class="home-text02"><span>Classes</span></span>
                <img
                  src="public/playground_assets/line46i227-vomo.svg"
                  alt="Line46I227"
                  class="home-line46"
                />
              </div>
            </div>
            <div class="home-notif-acc-setting">
            <a href='../logout.php'><?php session_name("session"); session_start(); $_SESSION["username"] ?>  
            <img
                src="public/playground_assets/logouti227-ctt.svg"
                alt="logoutI227"
                class="home-logout"
              />
            </a>
            </div>
          </div>
          <div class="home-widgets">
            <div class="home-frame71">
              <div class="home-group7">
                <span class="home-text04"><span>ISTE</span></span>
              </div>
              <div class="home-group8">
                <div class="home-group5">
                  <div class="home-frame99">
                    <img
                      src="public/playground_assets/personfill1wght700grad0opsz481i227-o286.svg"
                      alt="personFILL1wght700GRAD0opsz481I227"
                      class="home-person-fill1wght700grad0opsz481"
                    />
                  </div>
                  <span class="home-text06">
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
                      $count = "SELECT COUNT(*) FROM logs WHERE classID in (SELECT classID from classlist WHERE profID=$profid)";
                      $stmt = $db->query($count);
                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      foreach($results as $row => $r){
                        foreach($r as $value){
                          echo " $value Students";
                        }
                        
                      }
                    ?>
                  </span>
                </div>
              </div>
            </div>
            <div class="home-frame107">
              <div class="home-frame108">
                        <?php  
                      $classlist = "SELECT classID, class FROM classlist WHERE profID=$profid";
                      $classidlist = "SELECT classID FROM classlist WHERE profID=$profid";
                      $stmt = $db->query($classlist);
                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                      $resultsarr = [];
                      foreach($results as $row => $r){ 
                          array_push($resultsarr, $value);
                              echo "<div class='home-single-class'>
                              <div class='home-frame73'>
                                <div class='home-frame74'>
                                    <span class='home-text08'>
                                  <a href='../classTest/index.php?id={$r["classID"]}'>". $r["class"]."</span></div></div></div></a>"; 
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
