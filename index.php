<?php
require_once 'assets/php/logout.php';
require_once 'assets/php/languages.php';
require_once 'assets/php/currency.php';
$curr = new Convert();
$lang = new lang; ?>
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
    <link rel="canonical" href="//">
    <!-- Title and description -->

    <title>
        monchercosmetics

    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

    <!-- CSS -->
    <link href="assets/scss/timber.scss.css?v=151563946203901942921656108496" rel="stylesheet" type="text/css" media="all" />

    <!-- Put all third-party CSS files in the vendor.css file and minify the files -->
    <link href="assets/css/fontawesome.min.css?v=178752422870662007391636534405" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/ionicons.min.css?v=184364306120675196201636534415" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/simple-line-icons.css?v=75422508495091942381636534431" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/bootstrap.min.css?v=1635492923275245391636534393" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/plugins.css?v=122406971487135595881636534427" rel="stylesheet" type="text/css" media="all" />
    <link href="assets/css/vendor.css?v=48519775405221018061636534438" rel="stylesheet" type="text/css" media="all" />

    <!-- Link your style.css and responsive.css files below -->
    <link href="assets/css/style.css?v=113478237291809849591637744100" rel="stylesheet" type="text/css" media="all" />

    <!-- Theme Default CSS -->
    <link href="assets/css/theme-default.css?v=33502334051303111311636534454" rel="stylesheet" type="text/css" media="all" />
    <!-- Make your theme CSS calls here -->
    <link href="assets/css/theme-custom.css?v=67883068518435063311659176671" rel="stylesheet" type="text/css" media="all" />


    <!-- Make your theme RTL CSS calls here -->
    <link href="assets/css/theme-responsive.css?v=180198301791881128331636534436" rel="stylesheet" type="text/css" media="all" />

    <!-- Make all your dynamic CSS and Color calls here -->
    <link href="assets/css/skin-and-color.css?v=164756380459012075691637744238" rel="stylesheet" type="text/css" media="all" />
    <!-- Header hook for plugins -->

    <!-- JS -->
    <!-- Your update file include here -->

    <script src="assets/js/jquery-3.5.1.min.js?v=60938658743091704111636534421"></script>

    <!-- Put all third-party JS files in the vendor.css file and minify the files -->

    <script src="assets/js/plugins.js?v=130388353295227686641636534428"></script>


    <!-- Your main.js file upload this file -->
    <script src="assets/js/theme.js?v=157086564405513351031636534455"></script>

</head>

<body id="looki-beauty-cosmetics-ecommerce-shopify-theme" class="template-index">

    <div class="wrapper">
        <?php require_once 'assets/php/menu.php'; ?>
        <main>
            <div id="shopify-section-template--14265434177596__main" class="shopify-section">
                <!-- main slider start -->
                <section class="bg-light" id="section-template--14265434177596__main" data-section="SlideShow">
                    <div class="main-slider dots-style">


                        <div class="slider-item bg-img bg-img1" style="background-image: url(assets/img/bg/background.png);">
                            <div class="container">
                                <div class="row align-items-center  slider-height">
                                    <div class="col-12">
                                        <div class="slider-content text-left">

                                            <p class="text animated" data-animation-in="fadeInDown" data-delay-in=".300">
                                                Mon Cher Cosmetics
                                            </p>


                                            <h1 class="title animated" style="width: 723px;">

                                                <span class="animated font-weight-bold" data-animation-in="fadeInRight" data-delay-in="1.5">
                                                    <?php echo $lang->words['MainPage']['SURPRISE GIFT for orders above']; ?> <custom style="font-size: 4rem;"><?php echo intval($curr->GetConvertPrice(41.60)); ?><?php if ($_SESSION['lang'] == 'EN') { ?>&euro; <?Php } else { ?> RON <?Php } ?></custom>
                                                </span>

                                            </h1>


                                            <a href="/collections/all" class="btn btn-outline-primary btn--lg animated mt-45 mt-sm-25" data-animation-in="fadeInLeft" data-delay-in="1.9">
                                                <?php echo $lang->words['MainPage']['Buy']; ?>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- main slider end -->
                <style data-shopify>
                    #section-template--14265434177596__main {}

                    @media (min-width: 768px) and (max-width: 991px) {
                        #section-template--14265434177596__main {}
                    }

                    @media (max-width: 767px) {
                        #section-template--14265434177596__main {}
                    }
                </style>
                <style>
                </style>


            </div>
            <div id="shopify-section-template--14265434177596__16365333819e8b9c11" class="shopify-section">
                <?php
                require_once 'assets/php/product.php';
                require_once 'assets/php/cart.php';
                require_once 'assets/php/category.php';

                $cart = new Cart();

                $cart->Cart();

                $Product = new Products();
                $categort = new Category;

                $Product->product('ORDER BY `id` DESC LIMIT 3');
                ?>
                <section class="product-tab bg-white pt-50 pb-80" id="section-template--14265434177596__16365333819e8b9c11" data-section="TabProduct">
                    <div class="container">
                        <div class="product-tab-nav mb-50">
                            <div class="row align-items-center">

                                <div class="col-12">
                                    <div class="section-title text-center">

                                        <h2 class="title pb-3 mb-3"><?php echo $lang->words['MainPage']['New Products']; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product-tab-nav end -->
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade  show active" id="tab-16365333819e8b9c11-0-new-products" role="tabpanel" aria-labelledby="tab-16365333819e8b9c11-0-new-products-tab">
                                        <div class="product-slider-init theme1 slick-nav" data-slick='{
        		"infinite": false,
                "slidesToScroll": 1,"slidesToShow": 4,
                "responsive":[
                    {"breakpoint":992, "settings": {"slidesToShow": 3} },
                    {"breakpoint":768, "settings": {"slidesToShow": 2} },
                    {"breakpoint":480, "settings": {"slidesToShow": 1} }
                  ] 

          }'>
                                            <?Php foreach ($Product->data as $ProductData) { ?>
                                                <div class="slider-item">
                                                    <div class="card product-card 39329676918844 product-wrapper">
                                                        <div class="card-body p-0">
                                                            <div class="">
                                                                <div class="product-thumbnail position-relative">

                                                                    <?php if (!empty($ProductData['Discount'])) { ?> <span class="percent-count badge badge-danger top-right">-<?php echo $ProductData['Discount']; ?>%</span><?Php } ?>
                                                                    <a href="products.php?product=<?php echo $ProductData['Product Name']; ?>">
                                                                        <img class="first-img popup_cart_image" src="GetImage.php?ImageId=<?php $image = explode(',', $ProductData['image_id']);
                                                                                                                                            echo $image[0]; ?>" alt="orginal Clear Water Cosmetics On Trend" />
                                                                    </a>
                                                                    <!-- product links -->
                                                                    <ul class="actions d-flex justify-content-center">
                                                                        <li>
                                                                            <a class="action action-wishlist tile-actions--btn flex wishlist-btn wishlist" href="<?php if (isset($_SESSION['wishlist'])) {
                                                                                                                                                                        if (in_array($ProductData['id'], $_SESSION['wishlist'])) {
                                                                                                                                                                            echo '?RvProductWishlist=' . $ProductData['id'];
                                                                                                                                                                        } else {
                                                                                                                                                                            echo '?AddToWishlist=' . $ProductData['id'];
                                                                                                                                                                        }
                                                                                                                                                                    } else {
                                                                                                                                                                        echo '?AddToWishlist=' . $ProductData['id'];
                                                                                                                                                                    } ?>">
                                                                                <span class="add-wishlist">
                                                                                <?php if (isset($_SESSION['wishlist'])) {
                                                                                        if (in_array($ProductData['id'], $_SESSION['wishlist'])) { ?>
                                                                                            <span data-toggle="tooltip" data-placement="bottom" title="add to wishlist" style="color:red;" class="fa-solid fa-heart"></span>
                                                                                        <?php } else { ?>
                                                                                            <span data-toggle="tooltip" data-placement="bottom" title="add to wishlist" class="fa-solid fa-heart"></span>
                                                                                        <?php }
                                                                                    } else {
                                                                                        ?>
                                                                                        <span data-toggle="tooltip" data-placement="bottom" title="add to wishlist" class="fa-solid fa-heart"></span>
                                                                                    <?php
                                                                                    } ?>
                                                                                </span>
                                                                            </a>
                                                                        </li>             
                                                                    </ul>
                                                                    <!-- product links end-->
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="product-desc">
                                                                        <div class="product-color">
                                                                            <ul class="grid-color-swatch ">



                                                                            </ul>
                                                                        </div>
                                                                        <h3 class="title popup_cart_title">
                                                                            <a href="products.php?product=<?php echo $ProductData['Product Name']; ?>"><?php echo $ProductData['Product Name']; ?></a>
                                                                        </h3>
                                                                        <div class="star-rating">
                                                                            <span class="shopify-product-reviews-badge" data-id="6567241023548"></span>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                            <span class="product-price">
                                                                                <?php if (!empty($ProductData['Discount'])) { ?> <del class="del">
                                                                                        <span class=money><?Php echo $curr->GetConvertPrice($ProductData['Product Price']); ?></span>
                                                                                    </del><?php } ?>
                                                                                <span class="onsale">
                                                                                    <span class=money><?Php echo $curr->GetConvertPrice($ProductData['Product Price'] - ($ProductData['Product Price'] * ($ProductData['Discount'] / 100))); ?></span>
                                                                                </span>
                                                                            </span>
                                                                            <a href="?AddToCart=<?php echo $ProductData['id']; ?>" class="ajax-spin-cart pro-btn">
                                                                                <span>
                                                                                    <span class="cart-title"><i class="fa-solid fa-cart-shopping"></i></span>
                                                                                </span>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?Php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
    </div>
    <div id="shopify-section-template--14265434177596__16365333819e8b9c11" class="shopify-section">
        <!-- product tab start -->
        <?php

        $Product->GetProductDataQuery("SELECT `Category` FROM products");

        foreach ($Product->data as $list) {
            $f = "'" . $list . "'";
            $nn[] = $f;
        }

        $where =  implode(',', $nn);

        $categort->GetCategoryDataCondition("WHERE `Category Name` IN ($where) ORDER BY `Category Name` ASC LIMIT 14");

        $CategoryData = $categort->CategoryData;


        foreach ($categort->CategoryData as $CategoryData) { ?>
            <?php $Product->product("WHERE category = '{$CategoryData['Category Name']}'"); ?>


            <section class="product-tab bg-white pt-50 pb-80" id="section-template--14265434177596__16365333819e8b9c11" data-section="TabProduct">
                <div class="container">
                    <div class="product-tab-nav mb-50">
                        <div class="row align-items-center">

                            <div class="col-12">
                                <div class="section-title text-center">

                                    <h2 class="title pb-3 mb-3"><?php echo $CategoryData['Category Name']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product-tab-nav end -->
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade  show active" id="tab-16365333819e8b9c11-0-new-products" role="tabpanel" aria-labelledby="tab-16365333819e8b9c11-0-new-products-tab">
                                    <div class="product-slider-init theme1 slick-nav" data-slick='{
        		"infinite": false,
                "slidesToScroll": 1,"slidesToShow": 4,
                "responsive":[
                    {"breakpoint":992, "settings": {"slidesToShow": 3} },
                    {"breakpoint":768, "settings": {"slidesToShow": 2} },
                    {"breakpoint":480, "settings": {"slidesToShow": 1} }
                  ] 

          }'>
                                        <?Php foreach ($Product->data as $ProductData) {  ?>
                                            <div class="slider-item">
                                                <div class="card product-card 39329676918844 product-wrapper">
                                                    <div class="card-body p-0">
                                                        <div class="">
                                                            <div class="product-thumbnail position-relative">

                                                                <a href="products.php?product=<?php echo $ProductData['Product Name']; ?>">
                                                                    <img class="first-img popup_cart_image" src="GetImage.php?ImageId=<?php $image = explode(',', $ProductData['image_id']);
                                                                                                                                        echo $image[0]; ?>" alt="orginal Clear Water Cosmetics On Trend" />
                                                                </a>
                                                                <!-- product links -->
                                                                <ul class="actions d-flex justify-content-center">
                                                                    <li>
                                                                        <a class="action action-wishlist tile-actions--btn flex wishlist-btn wishlist" href="<?php if (isset($_SESSION['wishlist'])) {
                                                                                                                                                                    if (in_array($ProductData['id'], $_SESSION['wishlist'])) {
                                                                                                                                                                        echo '?RvProductWishlist=' . $ProductData['id'];
                                                                                                                                                                    } else {
                                                                                                                                                                        echo '?AddToWishlist=' . $ProductData['id'];
                                                                                                                                                                    }
                                                                                                                                                                } else {
                                                                                                                                                                    echo '?AddToWishlist=' . $ProductData['id'];
                                                                                                                                                                } ?>">
                                                                            <span class="add-wishlist">
                                                                            <?php if (isset($_SESSION['wishlist'])) {
                                                                                        if (in_array($ProductData['id'], $_SESSION['wishlist'])) { ?>
                                                                                            <span data-toggle="tooltip" data-placement="bottom" title="add to wishlist" style="color:red;" class="fa-solid fa-heart"></span>
                                                                                        <?php } else { ?>
                                                                                            <span data-toggle="tooltip" data-placement="bottom" title="add to wishlist" class="fa-solid fa-heart"></span>
                                                                                        <?php }
                                                                                    } else {
                                                                                        ?>
                                                                                        <span data-toggle="tooltip" data-placement="bottom" title="add to wishlist" class="fa-solid fa-heart"></span>
                                                                                    <?php
                                                                                    } ?>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <!-- product links end-->
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="product-desc">
                                                                    <div class="product-color">
                                                                        <ul class="grid-color-swatch ">



                                                                        </ul>
                                                                    </div>
                                                                    <h3 class="title popup_cart_title">
                                                                        <a href="products.php?product=<?php echo $ProductData['Product Name']; ?>"><?php echo $ProductData['Product Name']; ?></a>
                                                                    </h3>
                                                                    <div class="star-rating">
                                                                        <span class="shopify-product-reviews-badge" data-id="6567241023548"></span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <span class="product-price"><span class="onsale"><span class=money><?php echo $curr->GetConvertPrice(
                                                                                                                                                $ProductData['Product Price']
                                                                                                                                            ); ?></span></span>
                                                                        </span><a href="?AddToCart=<?php echo $ProductData['id']; ?>" class="ajax-spin-cart pro-btn">
                                                                            <span>
                                                                                <span class="cart-title"><i class="fa-solid fa-cart-shopping"></i></span>

                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?Php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        <?Php } ?>
        <!-- product tab end -->
    </div>
    </main>
    <?php require 'assets/php/footer.php'; ?>
</body>

</html>