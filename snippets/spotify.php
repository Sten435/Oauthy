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
            <h1 class="card-title text-uppercase text-center"><h1 class='text-center txt-larger-x'><i class="fab fa-spotify" style="color: #1DB954; margin-right: 1rem;"></i><b>Spotify (PHP)</b></h1></h1>
            <hr>
            <h6 class='text-center'><b>1: <span class='txt-smaller-x code-txt'>composer require kerox/oauth2-spotify</span></b></h6>
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
      
      $provider = new Kerox\OAuth2\Client\Provider\Spotify([
        "clientId"     => "/* clientId */",
        "clientSecret" => "/* clientSecret */",
        "redirectUri"  => "/* redirectUri */",
      ]);
    
      $authUrl = $provider->getAuthorizationUrl([
            "scope" => [
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_EMAIL,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_PRIVATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_UGC_IMAGE_UPLOAD,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_MODIFY_PLAYBACK_STATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_PLAYBACK_STATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_CURRENTLY_PLAYING,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_TOP_READ,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_RECENTLY_PLAYED,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_LIBRARY_MODIFY,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_LIBRARY_READ,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_FOLLOW_MODIFY,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_FOLLOW_READ,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_PLAYLIST_READ_PRIVATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_PLAYLIST_MODIFY_PUBLIC,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_PLAYLIST_MODIFY_PRIVATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_PLAYLIST_READ_COLLABORATIVE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_APP_REMOTE_CONTROL,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_APP_REMOTE_CONTROL,
            ]
      ]);
        
      $_SESSION["oauth2state"] = $provider->getState();
        
      header("Location: " . $authUrl);
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

      $provider = new Kerox\OAuth2\Client\Provider\Spotify([
        "clientId"     => "/* clientId */",
        "clientSecret" => "/* clientSecret */",
        "redirectUri"  => "/* redirectUri */",
      ]);

      if (!isset($_GET["code"])) {
        // If we don"t have an authorization code then get one
        $authUrl = $provider->getAuthorizationUrl([
            "scope" => [
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_EMAIL,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_PRIVATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_UGC_IMAGE_UPLOAD,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_MODIFY_PLAYBACK_STATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_PLAYBACK_STATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_CURRENTLY_PLAYING,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_TOP_READ,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_READ_RECENTLY_PLAYED,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_LIBRARY_MODIFY,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_LIBRARY_READ,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_FOLLOW_MODIFY,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_USER_FOLLOW_READ,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_PLAYLIST_READ_PRIVATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_PLAYLIST_MODIFY_PUBLIC,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_PLAYLIST_MODIFY_PRIVATE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_PLAYLIST_READ_COLLABORATIVE,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_APP_REMOTE_CONTROL,
                Kerox\OAuth2\Client\Provider\Spotify::SCOPE_APP_REMOTE_CONTROL,
            ]
      ]);
    
      $_SESSION["oauth2state"] = $provider->getState();
    
      header("Location: " . $authUrl);
      exit;

      // Check given state against previously stored one to mitigate CSRF attack
      } elseif (empty($_GET["state"]) || ($_GET["state"] !== $_SESSION["oauth2state"])) {

            unset($_SESSION["oauth2state"]);
            echo "error";
            exit;

      }

      // Try to get an access token (using the authorization code grant)
      $token = $provider->getAccessToken("authorization_code", [
        "code" => $_GET["code"]
      ]);

      // Optional: Now you have a token you can look up a users profile data
      try {

            // We got an access token, let"s now get the user"s details
            /** @var \Kerox\OAuth2\Client\Provider\SpotifyResourceOwner $user */
            $user = $provider->getResourceOwner($token);
            
            $newdata = (object) [
              "id" => $user->toArray()["id"],
              "display_name" => $user->toArray()["display_name"],
              "email" => $user->toArray()["email"],
              "explicit_content_filter_enabled" => $user->toArray()["explicit_content"]["filter_enabled"],
              "explicit_content_filter_locked" => $user->toArray()["explicit_content"]["filter_locked"],
              "external_urls" => $user->toArray()["external_urls"],
              "followers_href" => $user->toArray()["followers"]["href"],
              "followers_total" => $user->toArray()["followers"]["total"],
              "href" => $user->toArray()["href"],
              "images" => $user->toArray()["images"],
              "product" => $user->toArray()["product"],
              "type" => $user->toArray()["type"],
              "uri" => $user->toArray()["uri"],
          ];

      var_dump($newdata);
      exit;

      } catch (Exception $e) {
            NoPermission("Error, while trying to connect to Spotify");
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