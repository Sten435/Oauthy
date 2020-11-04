<?php 
include_once 'env.php';

// VARS
$contact_EmailAdrr = 'contact@wcts.com';

require './php/head.php';
if(isset($_GET['error'])){
    if($_GET['error'] === 'access_denied'){
        $err_msg = '<div id="err_popup" class="alert alert-warning close-header-err"><strong>' . $_GET['error_desc'] . '</strong>.</div>';
    }
    if($_GET['error'] === 'google_oauth_error'){
        $err_msg = '<div id="err_popup" class="alert alert-warning close-header-err"><strong>' . $_GET['error_desc'] . '</strong>.</div>';
    }
}
if(isset($err_msg)){
    if($err_msg != null){
        echo($err_msg);
    }
} ?>
    <?php include "./php/header.php" ?>
<!DOCTYPE html>
<html lang="en">
<body>
<br>
<br>
<br>
<br>
  <main id="main">
    <div class="spacer">
      <section id="start" class="features">
        <div class="container">
        <div class="section-title">
          <h2>Select Your Platform<span style='color: #4c4cd4'> (PHP)</span></h2>
        </div>
          <div class="row">
              <div class="col-lg-3 col-md-4 hoversic">
              <a href="./snippets/facebook">
                <div class="icon-box heightFiveRem">
                  <i class="fab fa-facebook" style="color: #5578ff;"></i>
                  <h3>Facebook</h3>
                </div>
              </a>
              </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-md-0 hoversic">
            <a href="./snippets/google">
              <div class="icon-box heightFiveRem">
                <i class="fab fa-google" style="color: #4285F4;"></i>
                <h3>Google</h3>
              </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-md-0 hoversic">
            <a href="./snippets/microsoft">
              <div class="icon-box heightFiveRem">
                <i class="fab fa-microsoft" style="color: #00A4EF;"></i>
                <h3>Microsoft</h3>
              </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 mt-lg-0 hoversic">
            <a href="./snippets/twitter">
              <div class="icon-box heightFiveRem">
                <i class="fab fa-twitter" style="color: #47aeff;"></i>
                <h3>Twitter</h3>
              </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 hoversic">
            <a href="../snippets/discord">
              <div class="icon-box heightFiveRem">
                <i class="fab fa-discord" style="color: #7289da;"></i>
                <h3>Discord</h3>
              </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 hoversic">
            <a href="../snippets/steam">
              <div class="icon-box heightFiveRem">
                <i class="fab fa-steam" style="color: #000;"></i>
                <h3>Steam</h3>
              </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 hoversic">
            <a href="../snippets/battlenet">
              <div class="icon-box heightFiveRem">
                <i class="fab fa-battle-net" style="color: #4233ff;"></i>
                <h3>Battlenet</h3>
              </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-4 mt-4 hoversic">
            <a href="./snippets/spotify">
              <div class="icon-box heightFiveRem">
              <i class="fab fa-spotify" style="color: #1DB954;"></i>
                <h3>Spotify</h3>
              </div>
              </a>
            </div>
          </div>

        </div>
      </section>
    </div>

  </main>
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-lg-2 col-md-6 footer-links w-100" style='max-width: 100%; flex: auto;'>
            <h2 style='text-align: center; width:100%; max-width: 100%'><b>Support Me</b></h2>
            <br>
            <h1 class='text-center'>
            <script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="sten" data-color="#5F7FFF" data-emoji="🍪"  data-font="Inter" data-text="Buy me a coffee" data-outline-color="#000000" data-font-color="#ffffff" data-coffee-color="#FFDD00" ></script>
            </h1>
            <div style='position: relative;'>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-center mx-auto">
        <div class="copyright">
          &copy; Copyright <strong><span><?= $_SERVER['SERVER_NAME'] ?></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <br>
          <p>Designed by <a href="https://bootstrapmade.com/" target='_blank'>BootstrapMade</a></p>
          <h2><b><a href="https://github.com/Sten435" target='_blank'>Developed by Stan</a></b></h2>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <scrip src="assets/vendor/jquery/jquery.min.js"></scrip>
  <scrip src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></scrip>
  <scrip src="assets/vendor/jquery.easing/jquery.easing.min.js"></scrip>
  <scrip src="assets/vendor/php-email-form/validate.js"></scrip>
  <scrip src="assets/vendor/waypoints/jquery.waypoints.min.js"></scrip>
  <scrip src="assets/vendor/counterup/counterup.min.js"></scrip>
  <scrip src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></scrip>
  <scrip src="assets/vendor/venobox/venobox.min.js"></scrip>

  <scrip src="assets/js/main.js"></scrip>

</body>

</html>