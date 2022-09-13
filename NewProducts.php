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

<body id="products" class="template-collection">
    <div class="wrapper">
        <div id="shopify-section-header" class="shopify-section">
            <?php require_once 'assets/php/menu.php'; ?>
            <main>
                <div id="shopify-section-template--14265434112060__main" class="shopify-section">
                    <!-- product tab start -->
                    <div class="product-tab bg-white" id="section-template--14265434112060__main">
                        <div class="container">
                            <div class="row flex-row-reverse">
                                <div class="col-lg-9 col-12">
                                    <!--
                                       <div class="grid-nav-wraper bg-lighten2 mb-30">
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-3 mb-3 mb-md-0">
                                                <div class="short-tab shop-grid-nav">
                                                    <button class="change-view active" data-view="grid"><i class="fa fa-th"></i></button>
                                                    <button class="change-view" data-view="list"><i class="fa fa-list"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4 mb-3 mb-md-0">
                                                <span class="total-products text-capitalize">Showing
                                                    1 - 18
                                                    of
                                                    36
                                                    result </span>
                                            </div>
                                            <div class="col-12 col-md-5 position-relative">
                                                <div class="shop-grid-button d-flex align-items-center">
                                                    <span class="sort-by" for="SortBy">Sort by</span>
                                                    <select class="form-select custom-select" name="SortBy" id="SortBy">
                                                        <option value="manual">Featured</option>
                                                        <option value="best-selling">Best Selling</option>
                                                        <option value="title-ascending">Alphabetically, A-Z</option>
                                                        <option value="title-descending">Alphabetically, Z-A</option>
                                                        <option value="price-ascending">Price, low to high</option>
                                                        <option value="price-descending">Price, high to low</option>
                                                        <option value="created-descending">Date, new to old</option>
                                                        <option value="created-ascending">Date, old to new</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>




                                        <script>
                                            Shopify.queryParams = {};
                                            if (location.search.length) {
                                                for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
                                                    aKeyValue = aCouples[i].split('=');
                                                    if (aKeyValue.length > 1) {
                                                        Shopify.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
                                                    }
                                                }
                                            }

                                            $(function() {
                                                $('#SortBy')
                                                    .val('title-ascending')
                                                    .bind('change', function() {
                                                        Shopify.queryParams.sort_by = jQuery(this).val();
                                                        location.search = jQuery.param(Shopify.queryParams);
                                                    });
                                            });
                                        </script>
                                    </div>
             -->
                                    <div class="tab-content">
                                        <div class="row theme1">
                                            <?php
                                            require_once 'assets/php/product.php';
                                            require_once 'assets/php/cart.php';
                                            require_once 'assets/php/category.php';

                                            $cart = new Cart();

                                            $cart->Cart();

                                            $Product = new Products();
                                            $categort = new Category;

                                            $Product->product('ORDER BY `id` DESC');
                                            foreach ($Product->data as $ProductData) { ?>
                                                <div class="col-lg-4 col-md-6 col-12 mb-30" <?php if ($ProductData['stock'] == 0) { ?> style="pointer-events:none; opacity:0.6;" <?php } ?>>
                                                    <div class="card product-card 39329659125820 product-wrapper">
                                                        <div class="card-body p-0">
                                                            <div class="">
                                                                <div class="product-thumbnail position-relative">
                                                                    <!-- <span class="sale-title badge badge-danger top-right">Sale</span> -->

                                                                    <?php if (!empty($ProductData['Discount'])) { ?><span class="percent-count badge badge-danger top-right">-<?php echo $ProductData['Discount']; ?>%</span><?php } ?>

                                                                    <a href="products.php?product=<?php echo $ProductData['Product Name']; ?>">

                                                                        <img class="first-img popup_cart_image" src="GetImage.php?ImageId=<?php $image = explode(',', $ProductData['image_id']);
                                                                                                                                            echo $image[0]; ?>" alt="" />
                                                                    </a><!-- product links -->
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
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                    <!-- product links end-->
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="product-desc">
                                                                        <h3 class="title popup_cart_title">
                                                                            <a href="products.php?product=<?php echo $ProductData['Product Name']; ?>"><?php echo $ProductData['Product Name']; ?></a>
                                                                        </h3>
                                                                        <div class="star-rating">
                                                                            <span class="shopify-product-reviews-badge" data-id="6567239811132"></span>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-between">
                                                                            <span class="product-price">
                                                                                <?php if (!empty($ProductData['Discount'])) { ?> <del class="del">
                                                                                        <span class=money><?Php echo $curr->GetConvertPrice($ProductData['Product Price']); ?></span>
                                                                                    </del><?Php } ?>
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
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--
                                     <div class="row">
                                        <div class="col-12">

                                            <div class="theme-default-pagination">
                                                <nav class="pagination">
                                                    <ul class="">

                                                        <li class="disabled prev">
                                                            <a href="#">
                                                                <span>Prev</span>
                                                            </a>
                                                        </li>




                                                        <li class="active"><a href="">1</a></li>




                                                        <li>
                                                            <a href="/collections/all?page=2&view=list%2F%3Fpreview_theme_id%3D120222679100" title="">2</a>
                                                        </li>



                                                        <li class="next"><a href="/collections/all?page=2&view=list%2F%3Fpreview_theme_id%3D120222679100" title="Next &raquo;"><span aria-hidden="true">Next</span></a></li>

                                                    </ul>
                                                </nav>
                                            </div>


                                            <script>
                                                $(".theme-default-pagination .disabled a").removeAttr("href");
                                                $(".theme-default-pagination li.active a").removeAttr("href");
                                            </script>
                                        </div>
                                    </div>
                           -->
                                </div>
                                <div class="col-lg-3 col-12">
                                    <aside class="left-sidebar theme1 shop-sidebar storefront-filter">
                                        <form class="filter-form" name="testform" id="myform">
                                            <div class="product-widget sidbar-widget mb-60">
                                                <h3 class="title">Availability</h3>
                                                <div class="widget-check-box">
                                                    <ul>
                                                        <li>
                                                            <input type="checkbox" name="Stock" value="1" id="Filter-availability-1">
                                                            <label for="Filter-availability-1">In stock (33)</label>
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" name="Stock" value="0" id="Filter-availability-2">
                                                            <label for="Filter-availability-2">Out of stock (19)</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-widget sidbar-widget mb-60">
                                                <h3 class="title">Price</h3>
                                                <div class="widget-check-box">
                                                    <div class="sidebar-list-style">
                                                        <div class="checkbox-container categories-list sidebar-price-filter">
                                                            <div class="filter-range-from">
                                                                <span>From</span>
                                                                <input name="ProductPriceFrom" id="Filter-Price-2" type="number" placeholder="0" min="0" max="110.00">
                                                                <label for="Filter-Price-2"><?php if ($_SESSION['curency'] == "RON") {
                                                                                                echo $_SESSION['curency'];
                                                                                            } elseif ($_SESSION['curency'] == "EUR") {
                                                                                                echo "&euro;";
                                                                                            } ?></label>
                                                            </div>
                                                            <div class="filter-price-range-to">
                                                                <span>To</span>
                                                                <input name="ProductPriceTo" id="Filter-Price-2" type="number" placeholder="110.00" min="0" max="110.00">
                                                                <label for="Filter-Price-2"><?php if ($_SESSION['curency'] == "RON") {
                                                                                                echo $_SESSION['curency'];
                                                                                            } elseif ($_SESSION['curency'] == "EUR") {
                                                                                                echo "&euro;";
                                                                                            } ?></label>
                                                            </div>

                                                        </div>
                                                        <input class="theme-default-button" type="submit" value="Filter">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </aside>
                                    <script>
                                        $('input[type="checkbox"]').click(function() {
                                            setTimeout(function() {
                                                $('form[name="testform"]').submit();
                                            }, 500);
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product tab end -->
                    <style data-shopify>
                        #section-template--14265434112060__main {
                            padding-top: 80px;
                            padding-bottom: 80px;
                        }

                        @media (min-width: 768px) and (max-width: 991px) {
                            #section-template--14265434112060__main {
                                padding-top: 80px;
                                padding-bottom: 80px;
                            }
                        }

                        @media (max-width: 767px) {
                            #section-template--14265434112060__main {
                                padding-top: 60px;
                                padding-bottom: 60px;
                            }
                        }
                    </style>
                </div>
            </main>

            <?php require_once 'assets/php/footer.php'; ?>
        </div>
</body>

</html>