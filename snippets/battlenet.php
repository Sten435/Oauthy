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
            <h1 class="card-title text-uppercase text-center"><h1 class='text-center txt-larger-x'><i class="fab fa-battle-net" style="color: #4435FF; margin-right: 1rem;"></i><b>Battle.Net (PHP)</b></h1></h1>
            <hr>
            <h6 class='text-center'><b>1: Create a file and call it: <span class='txt-smaller-x code-txt' >Login.php</span> and paste the following code: </b></h6>
            <hr>
            <ul class="fa-ul no-margin">
              <li class='mb-5 mt-5'><span><?php highlight_string('<?php 
        $client_id = "/* client_id */";
        $secret = "/* secret */";
        $region = "us"; // This can be eu.
        $redirect_url = "/* redirect_url */";
              
        $scope = "openid";
        $state= "semirandom";
        $auth_url = "https://$region.battle.net/oauth/authorize?client_id=$client_id&scope=$scope&state=$state&redirect_uri=$redirect_url&response_type=code";

        header("Location: $auth_url");
?>') ?></span></li>
            </ul>
            <hr>
            <h6 class='text-center'><b>3: Create your redirect file and call it: <span class='code-txt'>Redirect.php</span> and paste the following code: </b></h6>
            <hr>
            <ul class="fa-ul no-margin">
              <li class='mb-5 mt-5'><span><?php highlight_string('<?php
        $client_id = "/* client_id */";
        $secret = "/* secret */";
        $region = "us"; // This can be eu.
        $grant_type = "authorization_code";
        $redirect_url = "/* redirect_url */";
        $scope = "openid";
        $state= "semirandom";
        $code = $_GET["code"];
              
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              
        curl_setopt($ch, CURLOPT_URL, "https://$region.battle.net/oauth/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "redirect_uri=$redirect_url&scope=$scope&grant_type=authorization_code&code=$code"); 
        curl_setopt($ch, CURLOPT_USERPWD, "$client_id:$secret");
              
        $headers = array();
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
              
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            NoPermission("Error, while trying to connect to Blizzard");
            exit;
        }
        curl_close($ch);
        $data = json_decode($result);
              
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch2, CURLOPT_URL, "https://$region.battle.net/oauth/userinfo");
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");
              
              
        $headers = array();
        $headers[] = "Authorization: Bearer $data->access_token";
        curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
              
        $result = curl_exec($ch2);
        if (curl_errno($ch2)) {
            NoPermission("Error, while trying to connect to Blizzard");
            exit;
        }
        curl_close($ch2);
        $result = json_decode($result);
              
        $newdata = (object) [
            "sub" => $result->sub,
            "id" => $result->id,
            "battletag" => $result->battletag,
        ];
              
        var_dump($newdata);
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