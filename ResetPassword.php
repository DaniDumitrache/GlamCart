<?php
require_once 'assets/php/languages.php';
session_start();

if (isset($_SESSION['AuthToken'])) {
    header('location: /');
}
?>

<!doctype html>
<!--[if IE 9]> <html class="ie9 no-js supports-no-cookies" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js supports-no-cookies" lang="en">
<!--<![endif]-->

<head>
    <!-- Basic and Helper page needs -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#5a5ac9">
    <link rel="canonical" href="//account/login"><!-- Title and description -->

    <title>
        monchercosmetics
    </title><!-- Helpers -->
    <!-- /snippets/social-meta-tags.liquid -->


    <meta property="og:type" content="website">
    <meta property="og:title" content="Account">


    <meta property="og:url" content="//account/login">
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

<body id="account" class="template-login">
    <div class="wrapper">
        <?php require 'assets/php/menu.php'; ?>
        <div id="shopify-section-breadcrumb" class="shopify-section">
            <style></style>


        </div>
        <main>
            <div class="customer-page theme-default-margin">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                            <div class="login">
                                <div id="CustomerLoginForm">
                                    <form method="post" id="customer_login" accept-charset="UTF-8">
                                        <div class="login-form-container">
                                            <div class="login-text">
                                                <h2>Choose a new password</h2>
                                                <p>Choose a strong password and don't use it for other accounts</p>
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
                                            <div class="login-form">
                                                <div class="form-group d-none">
                                                    <input type="hidden" id="Email" class="input-full" value="<?php if (isset($_GET['email']) && !empty($_GET['email'])) {
                                                                                                                    echo $_GET['email'];
                                                                                                                }; ?>">
                                                </div>
                                                <div class="form-group d-none">
                                                    <input type="hidden" id="Token" class="input-full" value="<?php if (isset($_GET['token']) && !empty($_GET['email'])) {
                                                                                                                    echo $_GET['token'];
                                                                                                                }; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" id="Password" class="input-full" placeholder="Password" autocorrect="off" autocapitalize="off" autofocus>
                                                    <span id="ErrPassword" class="error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" id="Cpassword" class="input-full" placeholder="Confirm Password" autocorrect="off" autocapitalize="off" autofocus>
                                                    <span id="ErrCpassword" class="error"></span>
                                                </div>

                                                <div class="login-toggle-btn">
                                                    <div class="form-action-button">
                                                        <button id="ResetPassword" class="theme-default-button">Change the password</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>


        <div id="shopify-section-footer" class="shopify-section">
            <!-- footer strat -->
            <?php require 'assets/php/footer.php'; ?>
            <!-- footer end -->
        </div>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/main.js"></script>

</html>