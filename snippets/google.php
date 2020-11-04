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
            <h1 class="card-title text-uppercase text-center"><h1 class='text-center txt-larger-x'><i class="fab fa-google" style="color: #4285F4; margin-right: 1rem;"></i><b>Google (PHP)</b></h1></h1>
            <hr>
            <h6 class='text-center'><b>1: <span class='txt-smaller-x code-txt'>composer google/apiclient:"^2.7"</span></b></h6>
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
      
      include("/* YourOwn_Path */vendor/autoload.php"); 
      if(!isset($_SESSION)){session_start();}

      const clientID = "/* YourClientID */"
      const clientSecret = "/* YourClientSecret */"
      const redirectURL = "/* YourRedirectURL */"

      $google_client = new Google_Client();

      $google_client->setClientId(clientID);

      $google_client->setClientSecret(clientSecret);

      $google_client->setRedirectUri(redirectURL);

      $google_client->addScope("https://www.googleapis.com/auth/plus.login");
      $google_client->addScope("https://www.googleapis.com/auth/userinfo.email");

      header("Location: ". $google_client->createAuthUrl());
      exit; 
?>') ?></span></li>
            </ul>
            <hr>
            <h6 class='text-center'><b>3: Create your redirect file and call it: <span class='code-txt'>Redirect.php</span> and paste the following code: </b></h6>
            <hr>
            <ul class="fa-ul no-margin">
              <li class='mb-5 mt-5'><span><?php highlight_string('<?php 
      function NoPermission($error){
        $error = str_replace(" ", "%20", $error);
        header("Location: /* YourOwn_Path */ /* Your_Main_Page.php */?error=access_denied&error_desc=" . $error);
        exit;
      }
                  
      include("/* YourOwn_Path */vendor/autoload.php"); 
      if(!isset($_SESSION)){session_start();}

      const clientID = "/* YourClientID */"
      const clientSecret = "/* YourClientSecret */"
      const redirectURL = "/* YourRedirectURL */"

      $google_client = new Google_Client();

      $google_client->setClientId(clientID);

      $google_client->setClientSecret(clientSecret);

      $google_client->setRedirectUri(redirectURL);

      $google_client->addScope("https://www.googleapis.com/auth/plus.login");
      $google_client->addScope("https://www.googleapis.com/auth/userinfo.email");

      if(!isset($_GET["code"])){
        NoPermission("Error try again later");
      }
    
      if(isset($_GET["code"])){
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    
        if(!isset($token["error"])){
    
            $google_client->setAccessToken($token["access_token"]);
    
            $_SESSION["access_token"] = $token["access_token"];
    
            $oAuth = new Google_Service_Oauth2($google_client);
    
            $data = $oAuth->userinfo_v2_me->get();
    
            $newdata = (object) [
                "email" => $data["email"],
                "name" => $data["name"],
                "lastName" => $data["familyName"],
                "firstName" => $data["givenName"],
                "id" => $data["id"],
                "locale" => $data["locale"],
                "picture" => $data["picture"],
                "verifiedEmail" => $data["verifiedEmail"],
              ];

            print_r($newdata);
        }
      }
      elseif(isset($_GET["error"])){
            NoPermission("The connection to the server has been interrupted");
        }
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