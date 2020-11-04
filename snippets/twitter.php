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
            <h1 class="card-title text-uppercase text-center"><h1 class='text-center txt-larger-x'><i class="fab fa-twitter" style="color: #47AEFF; margin-right: 1rem;"></i><b>Twitter (PHP)</b></h1></h1>
            <hr>
            <h6 class='text-center'><b>1: <span class='txt-smaller-x code-txt'>composer require abraham/twitteroauth</span></b></h6>
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

      use Abraham\TwitterOAuth\TwitterOAuth;

      define("CONSUMER_KEY", "/* CONSUMER_KEY */");

      // your app consumer secret
      define("CONSUMER_SECRET", "/* CONSUMER_SECRET */");

      // your app callback url
      define("OAUTH_CALLBACK", "/* REDIRECT_URL */");

     $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

     // get a request token from twitter
     $request_token = $connection->oauth("oauth/request_token", array("oauth_callback" => OAUTH_CALLBACK));

     // save twitter token info to the session
     $_SESSION["oauth_token"] = $request_token["oauth_token"];
     $_SESSION["oauth_token_secret"] = $request_token["oauth_token_secret"];
 
     $url = $connection->url("oauth/authorize", array("oauth_token" => $request_token["oauth_token"]));
     header("Location: $url");
     exit;
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
                  
      include("/* YourOwn_Path */vendor/autoload.php"); 
      if(!isset($_SESSION)){session_start();}

      // use our twitter helper
      use Abraham\TwitterOAuth\TwitterOAuth;

      if (isset($_GET["oauth_verifier"]) && isset($_GET["oauth_token"]) && isset($_SESSION["oauth_token"]) && $_GET["oauth_token"] == $_SESSION["oauth_token"]) {
      // coming from twitter callback url
      // setup connection to twitter with request token
      $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION["oauth_token"], $_SESSION["oauth_token_secret"]);
      // get an access token
      $access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_GET["oauth_verifier"]));
      // save access token to the session
      $_SESSION["twitter_access_token"] = $access_token;

      // get token info from session
      $oauthToken = $_SESSION["twitter_access_token"]["oauth_token"];
      $oauthTokenSecret = $_SESSION["twitter_access_token"]["oauth_token_secret"]; 

      // setup connection
      $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauthToken, $oauthTokenSecret);

      // user twitter connection to get user info
      $data = $connection->get("account/verify_credentials", ["include_email" => "true"]);
      if (property_exists($data, "errors")) { // errors, clear session so user has to re-authorize with our app
          $_SESSION = array();
           header("Refresh:0");
      } else {
          $newdata = (object) [
              "email" => $data->email,
              "screen_name" => $data->screen_name,
              "description" => $data->description,
              "location" => $data->location,
              "email" => $data->email,
               "profile_image_url_https" => $data->profile_image_url_https,
               "profile_banner_url" => $data->profile_banner_url,
             ];

            var_dump($newdata);
          }
      }
      else{
          NoPermission("Error, while trying to connect to Twitter");
          exit;
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