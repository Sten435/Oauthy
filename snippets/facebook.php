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
            <h1 class="card-title text-uppercase text-center"><h1 class='text-center txt-larger-x'><i class="fab fa-facebook" style="color: #5578ff; margin-right: 1rem;"></i><b>Facebook (PHP)</b></h1></h1>
            <hr>
            <h6 class='text-center'><b>1: <span class='txt-smaller-x code-txt'>composer require facebook/graph-sdk</span></b></h6>
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
      include "/* YourOwn_Path */Facebook/autoload.php";

      if(!isset($_SESSION)){session_start();}v
            
      $FB = new \Facebook\Facebook([
        "app_id" => "/* APP_ID */",
        "app_secret" => "/* APP_SECRET */",
        "default_graph_version" => "v2.10"
      ]);
            
      $helper = $FB->getRedirectLoginHelper();
            
      $redirectURL = "/* Domain */Redirect.php"
      $permissions = ["email"];
      $loginURL = $helper->getLoginUrl($redirectURL, $permissions);
      header("Location: " . $loginURL);
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
      include "/* YourOwn_Path */Facebook/autoload.php";

      if(!isset($_SESSION)){session_start();}
            
      $FB = new \Facebook\Facebook([
        "app_id" => "/* APP_ID */",
        "app_secret" => "/* APP_SECRET */",
        "default_graph_version" => "v2.10"
      ]);
            
      $helper = $FB->getRedirectLoginHelper();

      try {
        $accessToken = $helper->getAccessToken();
      } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        NoPermission("Error, while trying to connect to Facebook");
          exit;
      } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        NoPermission("Error, while trying to connect to Facebook");
          exit;
      }

      if (!$accessToken) {
        NoPermission("Please access the pages from the main page!");
        exit();
      }

      $oAuth2Client = $FB->getOAuth2Client();
      if (!$accessToken->isLongLived())
      $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

      $response = $FB->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
      $data = $response->getGraphNode()->asArray();
      $_SESSION["access_token"] = (string) $accessToken;

      if (!isset($_SESSION["access_token"])) {
        NoPermission("Access_token has not been set!");
        exit();
      }
      
      $newdata = (object) [
        "id" => $userData["id"],
        "first_name" => $userData["first_name"],
        "last_name" => $userData["last_name"],
        "email" => $userData["email"],
        "picture" => $userData["picture"]["url"],
        "picture_height" => $userData["picture"]["height"],
        "picture_width" => $userData["picture"]["width"],
        "is_silhouette" => $userData["picture"]["is_silhouette"],
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