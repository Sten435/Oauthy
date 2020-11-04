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
            <h1 class="card-title text-uppercase text-center"><h1 class='text-center txt-larger-x'><i class="fab fa-microsoft" style="color: #00A4EF; margin-right: 1rem;"></i><b>Microsoft (PHP)</b></h1></h1>
            <hr>
            <h6 class='text-center'><b>1: <span class='txt-smaller-x code-txt'>composer require stevenmaguire/oauth2-microsoft</span></b></h6>
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

        $provider = new Stevenmaguire\OAuth2\Client\Provider\Microsoft([
            "clientId"                  => "/* clientId */",
            "clientSecret"              => "/* clientSecret */",
            "redirectUri"               => "/* redirectUri */",
        ]);
        $options = [
            "state" => "OPTIONAL_CUSTOM_CONFIGURED_STATE",
            "scope" => ["wl.basic", "wl.signin","wl.birthday","wl.calendars", "wl.contacts_photos","wl.phone_numbers","wl.postal_addresses","wl.work_profile","wl.skydrive","wl.photos"] // array or string
        ];
        $authUrl = $provider->getAuthorizationUrl($options);
        $_SESSION["oauth2state"] = $provider->getState();
        header("Location: ".$authUrl);
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

        $provider = new Stevenmaguire\OAuth2\Client\Provider\Microsoft([
            // Required
            "clientId"                  => "/* clientId */",
            "clientSecret"              => "/* clientSecret */",
            "redirectUri"               => "/* redirectUri */",
        ]);
        
        if (!isset($_GET["code"])) {
            $options = [
                "state" => "OPTIONAL_CUSTOM_CONFIGURED_STATE",
                "scope" => ["wl.basic", "wl.signin","wl.birthday","wl.calendars", "wl.contacts_photos","wl.phone_numbers","wl.postal_addresses","wl.work_profile","wl.skydrive","wl.photos"] // array or string
            ];
            $authUrl = $provider->getAuthorizationUrl($options);
            $_SESSION["oauth2state"] = $provider->getState();
            header("Location: ".$authUrl);
            exit;
        
        // Check given state against previously stored one to mitigate CSRF attack
        } elseif (empty($_GET["state"]) || ($_GET["state"] !== $_SESSION["oauth2state"])) {
        
            unset($_SESSION["oauth2state"]);
            NoPermission("Error, while trying to connect to Microsoft");
            exit("Invalid state");
        
        } else {
        
            $token = $provider->getAccessToken("authorization_code", [
                "code" => $_GET["code"]
            ]);
        
            try {
        
                $user = $provider->getResourceOwner($token);

                $newdata = (object) [
                    "id" => $user->toArray()["id"],
                    "first_name" => $user->toArray()["first_name"],
                    "last_name" => $user->toArray()["last_name"],
                    "link" => $user->toArray()["link"],
                    "birth_day" => $user->toArray()["birth_day"],
                    "birth_month" => $user->toArray()["birth_month"],
                    "birth_year" => $user->toArray()["birth_year"],
                    "gender" => $user->toArray()["gender"],
                    "emails_preferred" => $user->toArray()["emails"]["preferred"],
                    "emails_account" => $user->toArray()["emails"]["account"],
                    "emails_personal" => $user->toArray()["emails"]["personal"],
                    "emails_business" => $user->toArray()["emails"]["business"],
                    "addresses_personal_street" => $user->toArray()["addresses"]["personal"]["street"],
                    "addresses_personal_city" => $user->toArray()["addresses"]["personal"]["city"],
                    "addresses_personal_state" => $user->toArray()["addresses"]["personal"]["state"],
                    "addresses_personal_postal_code" => $user->toArray()["addresses"]["personal"]["postal_code"],
                    "addresses_business_street" => $user->toArray()["addresses"]["personal"]["street"],
                    "addresses_business_city" => $user->toArray()["addresses"]["personal"]["city"],
                    "addresses_business_state" => $user->toArray()["addresses"]["personal"]["state"],
                    "addresses_business_postal_code" => $user->toArray()["addresses"]["personal"]["postal_code"],
                    "phones_personal" => $user->toArray()["phones"]["personal"],
                    "phones_business" => $user->toArray()["phones"]["business"],
                    "phones_mobile" => $user->toArray()["phones"]["business"],
                    "locale" => $user->toArray()["locale"],
                    "updated_time" => $user->toArray()["updated_time"],
                ];
                  
                var_dump($newdata);

                exit;
        
            } catch (Exception $e) {
                NoPermission("Error, while trying to connect to Microsoft");
                exit;
            }
        
            // Use this to interact with an API on the users behalf
            // echo $token->getToken();
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