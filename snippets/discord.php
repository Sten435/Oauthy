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
            <h1 class="card-title text-uppercase text-center"><h1 class='text-center txt-larger-x'><i class="fab fa-discord" style="color: #7289DA; margin-right: 1rem;"></i><b>Discord (PHP)</b></h1></h1>
            <hr>
            <h6 class='text-center'><b>1: <span class='txt-smaller-x code-txt'>composer require league/oauth2-client</span></b></h6>
            <hr>
            <h6 class='text-center'><b>2: Create a file and call it: <span class='txt-smaller-x code-txt'>Login.php</span> and paste the following code: </b></h6>
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

      $provider = new \League\OAuth2\Client\Provider\GenericProvider([
        "clientId"                => "/* clientId */",
        "clientSecret"            => "/* clientSecret */",
        "redirectUri"             => "/* redirectUri */",
        "urlAuthorize"            => "https://discord.com/api/oauth2/authorize",
        "urlAccessToken"          => "https://discord.com/api/oauth2/token",
        "urlResourceOwnerDetails" => "http://brentertainment.com/oauth2/lockdin/resource"
      ]);
    
      $authorizationUrl = $provider->getAuthorizationUrl() . "&scope=identify%20email%20messages.read%20connections";
    
      header("Location: " . $authorizationUrl);
?>') ?></span></li>
            </ul>
            <hr>
            <h6 class='text-center'><b>3: Create your redirect file and call it: <span class='code-txt'>Redirect.php</span> and paste the following code: </b></h6>
            <hr>
            <ul class="fa-ul no-margin">
              <li class='mb-5 mt-5'><span><?php highlight_string('<?php 
                  
      include("/* YourOwn_Path */vendor/autoload.php"); 
                  
      if(!isset($_SESSION)){session_start();}
                    
      if(isset($_GET["error"])){
      if($_GET["error"] === "access_denied"){
      NoPermission("../home?error=access_denied&error_desc=Request%20Canceled");
      exit;
      }
      }
      if(!isset($_GET["code"])){
      NoPermission("Error try again later");
      }
                  
      use GuzzleHttp\Client;
                  
      $provider = new \League\OAuth2\Client\Provider\GenericProvider([
        "clientId"                => "/* clientId */",
        "clientSecret"            => "/* clientSecret */",
        "redirectUri"             => "/* redirectUri */",
        "urlAuthorize"            => "https://discord.com/api/oauth2/authorize",
        "urlAccessToken"          => "https://discord.com/api/oauth2/token",
        "urlResourceOwnerDetails" => "http://brentertainment.com/oauth2/lockdin/resource"
      ]);
                    
      $accessToken = $provider->getAccessToken("authorization_code", [
        "code" => $_GET["code"]
       ]);
                    
      $usersinfo = $provider->getAuthenticatedRequest(
        "GET",
        "https://discord.com/api/users/@me",
        $accessToken
      );
      $connectionsinfo = $provider->getAuthenticatedRequest(
        "GET",
        "https://discord.com/api/users/@me/connections",
        $accessToken
      );
                    
      $client = new Client();
                    
       $usersinfo = $client->send($usersinfo, ["timeout" => 2]);
      $connectionsinfo = $client->send($connectionsinfo, ["timeout" => 2]);
                    
      $usersinfo = $usersinfo->getBody()->getContents();
      $connectionsinfo = $connectionsinfo->getBody()->getContents();
                    
      $usersinfo = json_decode($usersinfo);
      $connectionsinfo = json_decode($connectionsinfo);
                    
      $discordData = $usersinfo;
              
      $newdata = (object) [
        "id" => $discordData->id,
        "username" => $discordData->username,
        "avatar" => "https://cdn.discordapp.com/avatars/" . $discordData->id . "/" . $discordData->avatar . ".png",
        "discriminator" => $discordData->discriminator,
        "email" => $discordData->email,
        "verified" => $discordData->verified,
        "locale" => $discordData->locale,
      ];

        print_r($newdata);
        exit;
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