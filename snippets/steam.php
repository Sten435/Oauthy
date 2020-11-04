<!DOCTYPE html>
<html lang="en">
  <link rel="stylesheet" href="../assets/css/code.css">
<body>

  <!-- ======= Header ======= -->
  <?php 
  require '../php/head.php';
  include "../php/header.php";
  ?>

  <main id="main">

    <section class="inner-page">
      <div class="container">
      <section class="pricing py-5">
  <div class="container">
    <div class="row">
    <div class="col-lg-12 mb-5">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">
            <h1 class="card-title text-uppercase text-center"><h1 class='text-center txt-larger-x'><i class="fab fa-steam" style="color: #000000; margin-right: 1rem;"></i><b>Steam (PHP)</b></h1></h1>
            <hr>
            <h6 class='text-center'><b>1: <span class='txt-smaller-x code-txt'>composer require smith197/steamauthentication</span></b></h6>
            <hr>
            <h6 class='text-center'><b>2: Create a file and call it: <span class='txt-smaller-x code-txt' >Login.php</span> and paste the following code: </b></h6>
            <hr>
            <ul class="fa-ul no-margin">
              <li class='mb-5 mt-5'><span><?php highlight_string('<?php 
      function NoPermission($error){
          $error = str_replace(" ", "%20", $error);
          header("Location: /* YourOwn_Path */ /* Your_Main_Page.php */?error=access_denied&error_desc=" . $error);
          exit;
      }

      if(!isset($_SESSION)){session_start();}
      require ("../steamauth/steamauth.php");
	  require "../steamauth/openid.php";

      try {
        require "../steamauth/SteamConfig.php"; // Put your redirect UrL & Client ID & Secret in this file.
        $openid = new LightOpenID($steamauth["domainname"]);
        
        if(!$openid->mode) {
          $openid->identity = "https://steamcommunity.com/openid";
          header("Location: " . $openid->authUrl());
        } elseif ($openid->mode == "cancel") {
          NoPermission("User has canceled authentication");
          exit;
        } else {
          if($openid->validate()) { 
            $id = $openid->identity;
            $ptn = "/^https?:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
            preg_match($ptn, $id, $matches);
            
            $_SESSION["steamid"] = $matches[1];
            if (!headers_sent()) {
              header("Location: ".$steamauth["loginpage"]);
              exit;
            } else {
              ?>
              <script type="text/javascript">
                window.location.href="<?=$steamauth["loginpage"]?>";
              </script>
              <noscript>
                <meta http-equiv="refresh" content="0;url=<?=$steamauth["loginpage"]?>" />
              </noscript>
              <?php
              exit;
            }
          } else {
            NoPermission("Error, while trying to connect to Steam");
              exit;
          }
        }
      } catch(ErrorException $e) {
        NoPermission("Error, while trying to connect to Steam");
          exit;
      }
?>') ?></span></li>
            </ul>
            <hr>
            <h6 class='text-center'><b>3: Create another file and call it: <span class='code-txt'>Redirect.php</span> and paste the following code: </b></h6>
            <hr>
            <ul class="fa-ul no-margin">
              <li class='mb-5 mt-5'><span><?php highlight_string('<?php 
      function NoPermission($error){
        $error = str_replace(" ", "%20", $error);
        header("Location: /* YourOwn_Path */ /* Your_Main_Page.php */?error=access_denied&error_desc=" . $error);
        exit;
      }
                  
      if(!isset($_SESSION)){session_start();}
        require ("../steamauth/userInfo.php");
        require ("../steamauth/steamauth.php");

      if(!isset($steamprofile) || $steamprofile == null){
          NoPermission("Error, while trying to connect to Steam");
          exit;
      }
      else{

        $newdata = (object) [
          "id" => $steamprofile["steamid"],
          "lastlogout" => $steamprofile["lastlogoff"],
          "link" => $steamprofile["profileurl"],
          "avatar" => $steamprofile["avatarfull"],
          "name" => $steamprofile["realname"],
        ];
  
      var_dump($newdata);
?>') ?></span></li>
            </ul>
            <hr>
            <h6 class='text-center'><b>5: Navigate to <span class='code-txt'>YourDomain/Login.php</span></b></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
      </div>
    </section>

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>