<?php
require_once 'assets/php/languages.php';
$lang = new lang;
session_start();

if (isset($_SESSION['AuthToken'])) {
  header('location: /');
}
?>
<!doctype html>
<html class="no-js supports-no-cookies" lang="en">


<head>
  <!-- Basic and Helper page needs -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="theme-color" content="#5a5ac9">
  <link rel="canonical" href="//account/register"><!-- Title and description -->

  <title>
    Create Account



    &ndash; Looki - Beauty &amp; Cosmetics eCommerce Shopify Theme

  </title><!-- Helpers -->
  <!-- /snippets/social-meta-tags.liquid -->


  <meta property="og:type" content="website">
  <meta property="og:title" content="Create Account">


  <meta property="og:url" content="//account/register">
  <meta property="og:site_name" content="Looki - Beauty &amp; Cosmetics eCommerce Shopify Theme">




  <meta name="twitter:card" content="summary">




  <!-- CSS -->
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/timber.scss.css?v=151563946203901942921656108496" rel="stylesheet" type="text/css" media="all" />

  <!-- Put all third-party CSS files in the vendor.css file and minify the files -->
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/fontawesome.min.css?v=178752422870662007391636534405" rel="stylesheet" type="text/css" media="all" />
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/ionicons.min.css?v=184364306120675196201636534415" rel="stylesheet" type="text/css" media="all" />
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/simple-line-icons.css?v=75422508495091942381636534431" rel="stylesheet" type="text/css" media="all" />
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/bootstrap.min.css?v=1635492923275245391636534393" rel="stylesheet" type="text/css" media="all" />
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/plugins.css?v=122406971487135595881636534427" rel="stylesheet" type="text/css" media="all" />
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/vendor.css?v=48519775405221018061636534438" rel="stylesheet" type="text/css" media="all" />

  <!-- Link your style.css and responsive.css files below -->
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/style.css?v=113478237291809849591637744100" rel="stylesheet" type="text/css" media="all" />

  <!-- Theme Default CSS -->
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/theme-default.css?v=33502334051303111311636534454" rel="stylesheet" type="text/css" media="all" />
  <!-- Make your theme CSS calls here -->
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/theme-custom.css?v=67883068518435063311659176671" rel="stylesheet" type="text/css" media="all" />


  <!-- Make your theme RTL CSS calls here -->
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/theme-responsive.css?v=180198301791881128331636534436" rel="stylesheet" type="text/css" media="all" />

  <!-- Make all your dynamic CSS and Color calls here -->
  <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/8/assets/skin-and-color.css?v=164756380459012075691637744238" rel="stylesheet" type="text/css" media="all" />
  <!-- Header hook for plugins -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>

<body id="create-account" class="template-register">
  <div class="wrapper">
    <div id="shopify-section-header" class="shopify-section">
      <!-- header start -->
      <?php require 'assets/php/menu.php'; ?>
      <!-- header end -->
    </div>
    <main>
      <div class="customer-page theme-default-margin">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
              <div class="login">
                <div class="login-form-container">
                  <div class="login-text">
                    <h2>Create Account</h2>

                    <p>Please Register using account detail bellow.</p>

                  </div>
                  <style>
                    .error {
                      color: red;
                      font-size: 15px;
                    }

                    .form-group {
                      margin-bottom: 20px;
                    }

                    .login-form-container input {
                      margin-bottom: 0px;
                    }
                  </style>
                  <div class="register-form">
                    <form method="post" accept-charset="UTF-8">

                      <div class="form-group">
                        <label for="FirstName" class="hidden-label">First Name</label>
                        <input type="text" name="FirstName" id="FirstName" class="input-full" placeholder="First Name" autocapitalize="words" autofocus>
                        <span id="errorFirst" class="error"></span>
                      </div>

                      <div class="form-group">
                        <label for="LastName" class="hidden-label">Last Name</label>
                        <input type="text" name="LastName" id="LastName" class="input-full" placeholder="Last Name" autocapitalize="words">
                        <span id="errorLast" class="error"></span>
                      </div>

                      <div class="form-group">
                        <label for="Username" class="hidden-label">Last Name</label>
                        <input type="text" name="Username" id="Username" class="input-full" placeholder="Username" autocapitalize="words">
                        <span id="errorUser" class="error"></span>
                      </div>

                      <div class="form-group">
                        <label for="Email" class="hidden-label">Email</label>
                        <input type="email" name="customer[email]" id="Email" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off">
                        <span id="errorEmail" class="error"></span>
                      </div>

                      <div class="form-group">
                        <label for="Password" class="hidden-label">Password</label>
                        <input type="password" name="Password" id="Password" class="input-full" placeholder="Password">
                        <span id="errorPass" class="error"></span>
                      </div>

                      <div class="form-action-button" style="font-size: 20px;">
                        <input type="checkbox" id="newsletter"><label for="newsletter" style="font-size: 19px;">newsletter</label>
                      </div>

                      <div class="form-action-button">
                        <button id="CreateAccount" class="theme-default-button">Create</button>
                      </div>
                    </form>

                    <div class="account-optional-action">
                      <span>Already have account?</span>
                      <a href="login.php">Login Now</a>.
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- footer strat -->
    <?php require 'assets/php/footer.php'; ?>
    <!-- footer end -->
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/main.js"></script>

</html>