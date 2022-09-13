<?php
require_once 'assets/php/config.php';
require_once 'assets/php/cart.php';
require_once 'assets/php/currency.php';
require_once 'assets/php/languages.php';

$lang = new lang;
$cart = new Cart;
$cart->Cart();
$curr = new Convert;

session_start();

if (isset($_GET['product'])) {

    $product = $_GET['product'];

    class Product extends DataBase
    {
        public function GetProductData($product)
        {
            $sql = "SELECT * FROM products WHERE `Product Name` = '$product'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $this->data = $data;
        }
    }

    $products = new Product;

    $products->GetProductData($product);

    $data = $products->data;
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
        <link rel="canonical" href="https://art-furniture-3.myshopify.com/products/product-dummy-title-4">
        <!-- Title and description -->

        <title>
            <?php echo $data['Product Name']; ?>

        </title>
        <!-- CSS -->
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/timber.scss.css?v=10489224988868337871636535536" rel="stylesheet" type="text/css" media="all" />

        <!-- Put all third-party CSS files in the vendor.css file and minify the files -->
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/fontawesome.min.css?v=178752422870662007391636535193" rel="stylesheet" type="text/css" media="all" />
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/ionicons.min.css?v=184364306120675196201636535202" rel="stylesheet" type="text/css" media="all" />
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/simple-line-icons.css?v=75422508495091942381636535219" rel="stylesheet" type="text/css" media="all" />
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/bootstrap.min.css?v=1635492923275245391636535177" rel="stylesheet" type="text/css" media="all" />
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/plugins.css?v=122406971487135595881636535215" rel="stylesheet" type="text/css" media="all" />
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/vendor.css?v=48519775405221018061636535226" rel="stylesheet" type="text/css" media="all" />

        <!-- Link your style.css and responsive.css files below -->
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/style.css?v=75235454716260511651636535222" rel="stylesheet" type="text/css" media="all" />

        <!-- Theme Default CSS -->
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/theme-default.css?v=33502334051303111311636535239" rel="stylesheet" type="text/css" media="all" />
        <!-- Make your theme CSS calls here -->
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/theme-custom.css?v=163426069014072671311636535239" rel="stylesheet" type="text/css" media="all" />


        <!-- Make your theme RTL CSS calls here -->
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/theme-responsive.css?v=180198301791881128331636535224" rel="stylesheet" type="text/css" media="all" />

        <!-- Make all your dynamic CSS and Color calls here -->
        <link href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/skin-and-color.css?v=68388098730352906841636535239" rel="stylesheet" type="text/css" media="all" />
        <!-- Header hook for plugins -->
        <link rel="stylesheet" media="screen" href="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/compiled_assets/styles.css?4260">

        <style id="shopify-dynamic-checkout">
            .shopify-payment-button__button--hidden {
                visibility: hidden;
            }

            .shopify-payment-button__button {
                border-radius: 4px;
                border: none;
                box-shadow: 0 0 0 0 transparent;
                color: white;
                cursor: pointer;
                display: block;
                font-size: 1em;
                font-weight: 500;
                line-height: 1;
                text-align: center;
                width: 100%;
                transition: background 0.2s ease-in-out;
            }

            .shopify-payment-button__button[disabled] {
                opacity: 0.6;
                cursor: default;
            }

            .shopify-payment-button__button--unbranded {
                background-color: #1990c6;
                padding: 1em 2em;
            }

            .shopify-payment-button__button--unbranded:hover:not([disabled]) {
                background-color: #136f99;
            }

            .shopify-payment-button__more-options {
                background: transparent;
                border: 0 none;
                cursor: pointer;
                display: block;
                font-size: 1em;
                margin-top: 1em;
                text-align: center;
                width: 100%;
            }

            .shopify-payment-button__more-options:hover:not([disabled]) {
                text-decoration: underline;
            }

            .shopify-payment-button__more-options[disabled] {
                opacity: 0.6;
                cursor: default;
            }

            .shopify-payment-button__button--branded {
                display: flex;
                flex-direction: column;
                min-height: 44px;
                position: relative;
                z-index: 1;
            }

            .shopify-payment-button__button--branded .shopify-cleanslate {
                flex: 1 !important;
                display: flex !important;
                flex-direction: column !important;
            }
        </style>


        <!-- Your update file include here -->
        <script src="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/jquery-3.5.1.min.js?v=60938658743091704111636535204"></script>
        <script src="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/plugins.js?v=130388353295227686641636535216"></script>
        <script src="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/theme.js?v=157086564405513351031636535239"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    </head>

    <body id="orginal-clear-water-cosmetics-on-trend" class="template-product">
        <span id="GetProductData" class="d-none" style="display: none;"></span>
        <div class="wrapper">
            <div class="shopify-section">
                <?Php
                require_once 'assets/php/menu.php'; ?>

                <!-- offcanvas-overlay start -->
                <div class="offcanvas-overlay"></div>
                <!-- offcanvas-overlay end -->

                <!-- offcanvas-mobile-menu start -->
                <div id="offcanvas-mobile-menu" class="offcanvas theme1 offcanvas-mobile-menu">
                    <div class="inner">
                        <div class="border-bottom mb-4 pb-4 text-right">
                            <button class="offcanvas-close">×</button>
                        </div>
                        <div class="offcanvas-head mb-4">
                            <nav class="offcanvas-top-nav">
                                <ul class="d-flex flex-wrap">
                                    <li class="my-2 mx-2">
                                        <a href="/cart"><i class="icon-bag"></i> Cart <span>(1)</span>
                                        </a>
                                    </li>
                                    <li class="my-2 mx-2">
                                        <a href="">
                                            <i class="ion-android-favorite-outline"></i> Wishlist
                                        </a>
                                    </li>
                                    <li class="my-2 mx-2">
                                        <a class="search search-toggle" href="javascript:void(0)">
                                            <i class="icon-magnifier"></i> Search
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <nav class="offcanvas-menu">
                            <ul>



                                <li>
                                    <a href="/"><span class="menu-text">Home</span></a>
                                    <ul class="offcanvas-submenu">



                                        <li><a href="https://art-furniture-3.myshopify.com/?preview_theme_id=120916508732">Home 1</a></li>




                                        <li><a href="https://art-furniture-3.myshopify.com/?preview_theme_id=120916705340">Home 2</a></li>




                                        <li><a href="https://art-furniture-3.myshopify.com/?preview_theme_id=120916869180">Home RTL </a></li>


                                    </ul>
                                </li>



                                <li>
                                    <a href="/collections/all"><span class="menu-text">shop</span></a>
                                    <ul class="offcanvas-submenu">
                                        <li>
                                            <a href=""><span class="menu-text">Shop Grid</span></a>
                                            <ul class="offcanvas-submenu">
                                                <li><a href="https://art-furniture-3.myshopify.com/collections/all/?preview_theme_id=120222679100">Shop Grid 3 Column</a></li>
                                                <li><a href="https://art-furniture-3.myshopify.com/collections/all/?preview_theme_id=120272977980">Shop Grid 4 Column</a></li>
                                                <li><a href="https://art-furniture-3.myshopify.com/collections/all/?preview_theme_id=120222679100">Shop Grid Left Sidebar</a></li>
                                                <li><a href="https://art-furniture-3.myshopify.com/collections/all/?preview_theme_id=120272977980">Shop Grid Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=""><span class="menu-text">Shop List</span></a>
                                            <ul class="offcanvas-submenu">
                                                <li><a href="https://art-furniture-3.myshopify.com/collections/all?view=list/?preview_theme_id=120222679100">Shop List</a></li>
                                                <li><a href="https://art-furniture-3.myshopify.com/collections/all?view=list/?preview_theme_id=120222679100">Shop List Left Sidebar</a></li>
                                                <li><a href="https://art-furniture-3.myshopify.com/collections/all?view=list/?preview_theme_id=120272977980">Shop List Right Sidebar</a></li>
                                                <li><a href="/products/preorder-product">Preorder Product</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=""><span class="menu-text">Shop Single</span></a>
                                            <ul class="offcanvas-submenu">
                                                <li><a href="/products/5-simple-product">Shop Single</a></li>
                                                <li><a href="/products/3-variable-product">Shop Variable</a></li>
                                                <li><a href="/products/7-sample-affiliate-product">Shop Affiliate</a></li>
                                                <li><a href="/products/13-product-media-1">Shop Media</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href=""><span class="menu-text">other pages</span></a>
                                            <ul class="offcanvas-submenu">
                                                <li><a href="/pages/about">About Page</a></li>
                                                <li><a href="/cart">Cart Page</a></li>
                                                <li><a href="/checkout">Checkout Page</a></li>
                                                <li><a href="/collections/all">Compare Page</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="//cdn.shopify.com/s/files/1/0016/9626/8348/files/1_525x.png?v=1618480663" alt="" />
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="//cdn.shopify.com/s/files/1/0016/9626/8348/files/2_525x.png?v=1618480692" alt="" />
                                            </a>
                                        </li>
                                    </ul>
                                </li>




                                <li>
                                    <a href="#"><span class="menu-text">Pages </span></a>
                                    <ul class="offcanvas-submenu">



                                        <li><a href="/pages/about">About Page</a></li>




                                        <li><a href="/cart">Cart Page</a></li>




                                        <li><a href="/checkout">Checkout Page</a></li>




                                        <li><a href="/collections/all">Compare Page</a></li>




                                        <li><a href="/account/login">Login</a></li>




                                        <li><a href="/account/register">Register Page</a></li>




                                        <li><a href="/account">Account Page</a></li>




                                        <li><a href="/pages/wishlist">Wishlist Page</a></li>


                                    </ul>
                                </li>




                                <li>
                                    <a href="/blogs/news"><span class="menu-text">Blog </span></a>
                                    <ul class="offcanvas-submenu">



                                        <li>
                                            <a href="#"><span class="menu-text">Blog Grid</span></a>
                                            <ul class="offcanvas-submenu">

                                                <li><a href="https://art-furniture-3.myshopify.com/blogs/news/?preview_theme_id=120222679100">Blog Grid 3 column</a></li>

                                                <li><a href="https://art-furniture-3.myshopify.com/blogs/news/?preview_theme_id=120222679100">Blog Grid 4 column</a></li>

                                                <li><a href="https://art-furniture-3.myshopify.com/blogs/news/?preview_theme_id=120222679100">Blog Grid Left Sidebar</a></li>

                                                <li><a href="https://art-furniture-3.myshopify.com/blogs/news/?preview_theme_id=120222679100">Blog Grid Right Sidebar</a></li>

                                            </ul>
                                        </li>




                                        <li>
                                            <a href="#"><span class="menu-text">Blog List</span></a>
                                            <ul class="offcanvas-submenu">

                                                <li><a href="https://art-furniture-3.myshopify.com/blogs/news/?preview_theme_id=120272977980">Blog List Left Sidebar</a></li>

                                                <li><a href="https://art-furniture-3.myshopify.com/blogs/news/?preview_theme_id=120272977980">Blog List Right Sidebar</a></li>

                                            </ul>
                                        </li>




                                        <li>
                                            <a href="/blogs/news/it-is-a-long-established-fact-that-a-reader-will-1"><span class="menu-text">Blog Single</span></a>
                                            <ul class="offcanvas-submenu">

                                                <li><a href="/blogs/news/the-standard-chunk-of-lorem-ipsum-used-since-1">Single Blog</a></li>

                                                <li><a href="/blogs/news/the-standard-chunk-of-lorem-ipsum-used-since">Blog Single Left Sidebar</a></li>

                                                <li><a href="https://art-furniture-3.myshopify.com/blogs/news/it-is-a-long-established-fact-that-a-reader-will-1/?preview_theme_id=120272977980">Blog Single Right Sidbar</a></li>

                                            </ul>
                                        </li>


                                    </ul>
                                </li>




                                <li><a href="/pages/contact">contact Us</a></li>


                            </ul>
                        </nav>
                        <div class="offcanvas-social py-30">
                            <ul>

                                <li>
                                    <a href="#">
                                        <span class="icon-social-facebook"></span>
                                    </a>
                                </li>


                                <li>
                                    <a href="#">
                                        <span class="icon-social-twitter"></span>
                                    </a>
                                </li>


                                <li>
                                    <a href="#">
                                        <span class="icon-social-youtube"></span>
                                    </a>
                                </li>


                                <li class="mr-0">
                                    <a href="">
                                        <span class="icon-social-instagram"></span>
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
                <!-- offcanvas-mobile-menu end -->


                <!-- OffCanvas Cart Start -->





                <div id="offcanvas-cart" class="offcanvas offcanvas-cart theme1">
                    <div class="inner">
                        <div class="head d-flex flex-wrap justify-content-between">
                            <span class="title">Cart</span>
                            <button class="offcanvas-close">×</button>
                        </div>
                        <div class="cart-empty-title">
                            <h3>Your cart is currently empty.</h3>
                        </div>
                        <div class="single-product-cart">
                            <ul class="minicart-product-list single-cart-item-loop">

                                <li>
                                    <a class="image" href="/products/product-title-here-3?variant=39329676427324">
                                        <img src="//cdn.shopify.com/s/files/1/0016/9626/8348/products/04_c86ac07c-8c75-4a4c-ae29-76b5d203dd0f_small.jpg?v=1620554795" alt="">
                                    </a>
                                    <div class="content">
                                        <div class="mini-cart-text">
                                            <a class="title" href="/products/product-title-here-3?variant=39329676427324">The Cosmetics and Beauty brand Shoppe - red</a>
                                            <span class="quantity-price">
                                                Qty: 1 x <span class="amount"><span class=money>$39.00</span></span>
                                            </span>
                                        </div>
                                        <a href="javascript:void(0);" onclick="Shopify.removeItem(39329676427324)" class="remove">×</a>
                                    </div>
                                </li>

                            </ul>
                            <div class="sub-total d-flex flex-wrap justify-content-between">
                                <strong>Total :</strong>
                                <span class="amount shopping-cart__total"><span class=money>$39.00</span></span>
                            </div>
                            <div class="mini-cart-button">
                                <a href="/cart" class="btn btn-secondary btn--lg d-block d-sm-inline-block mr-sm-2">
                                    View Cart
                                </a>
                                <a href="/checkout" class="btn btn-dark btn--lg d-block d-sm-inline-block mt-4 mt-sm-0">
                                    Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- OffCanvas Cart End -->


                <!-- search-box and overlay start -->
                <div class="overlay search-bar">
                    <div class="scale"></div>
                    <form action="/search" method="get" class="search-box" role="search">

                        <input type="search" name="q" value="" placeholder="Search our store" aria-label="Search our store">
                        <button id="close" type="submit">
                            <i class="ion-ios-search-strong"></i>
                        </button>
                    </form>
                    <button class="close"><i class="ion-android-close"></i></button>
                </div>
                <!-- search-box and overlay end -->


                <style>
                    .theme-logo img {
                        max-width: 300px;
                    }
                </style>
                <style data-shopify>
                    #section-header {}

                    @media (min-width: 768px) and (max-width: 991px) {
                        #section-header {}
                    }

                    @media (max-width: 767px) {
                        #section-header {}
                    }
                </style>
            </div>
            <div id="shopify-section-breadcrumb" class="shopify-section">
                <style></style>


            </div>
            <main>
                <div id="shopify-section-template--14265465077820__main" class="shopify-section">
                    <section class="product-single theme1" id="section-template--14265465077820__main" data-section="single_product">
                        <div id="product-details-with-gallery">
                            <div class="container">
                                <div class="row ">
                                    <div class="col-lg-6 mb-5 mb-lg-0">
                                        <div class="product-details-img product-media">
                                            <div class="product-large-slider">

                                                <?php
                                                $image = explode(',', $data['image_id']);
                                                for ($i = 0; $i < count($image); $i++) { ?>

                                                    <div class="pro-large-img product-image">
                                                        <div class="product-zoom">
                                                            <img class="product_variant_image 20578210119740" data-media-id="20578210152508" data-zoom-image="//cdn.shopify.com/s/files/1/0016/9626/8348/products/01_e49a96d0-25db-46c1-b040-6a6238f6520f_1024x1024.jpg?v=1620554769" data-image="//cdn.shopify.com/s/files/1/0016/9626/8348/products/01_e49a96d0-25db-46c1-b040-6a6238f6520f_1024x1024.jpg?v=1620554769" src="GetImage.php?ImageId=<?php echo $image[$i]; ?>">
                                                        </div>
                                                    </div>
                                                <?php } ?>



                                            </div>
                                            <div class="pro-nav pro-nav-media slick-row-10 slick-arrow-style mt-30" id="ProductThumbs">
                                                <?php
                                                $image = explode(',', $data['image_id']);
                                                for ($i = 0; $i < count($image); $i++) { ?>
                                                    <a data-thumbnail-id="20578210119740" data-media-id="20578210119740" href="javascript: void(0)" data-image="//cdn.shopify.com/s/files/1/0016/9626/8348/products/16_ae4e9eea-efb0-4f5d-80fa-a812b5bd66d5_1024x1024.jpg?v=1620554769" data-zoom-image="//cdn.shopify.com/s/files/1/0016/9626/8348/products/16_ae4e9eea-efb0-4f5d-80fa-a812b5bd66d5_1024x1024.jpg?v=1620554769" class="">
                                                        <img src="GetImage.php?ImageId=<?php echo $image[$i]; ?>" alt="orginal Clear Water Cosmetics On Trend">
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="product-content">
                                            <div class="single-product-info">
                                                <h2 class="title mb-20" id="popup_cart_title"><?php echo $data['Product Name']; ?></h2>
                                                <div class="align-items-center mb-10">
                                                    <span class="product-price">
                                                        <span class="onsale">
                                                            <span class="money"><?php echo $curr->GetConvertPrice($data['Product Price']); ?></span>
                                                        </span>
                                                    </span>
                                                    <!-- For Unit Price  -->
                                                    <small class="unit_price_box caption  hidden">
                                                        <dd>
                                                            <span id="product__unit_price"></span>
                                                            <span aria-hidden="true">/</span>
                                                            <span id="product__unit_price_value">
                                                            </span>
                                                        </dd>
                                                    </small>
                                                    <!-- For Unit Price  -->
                                                </div>
                                                <div class="product-inventory mb-10">
                                                    <span class="inventory-title">Availability:</span> <span class="variant-inventory"><?php echo $data['stock']; ?> left in stock</span>
                                                </div>


                                                <div class="product-variant-option">
                                                    <select name="id" id="productSelect" class="product-single__variants" style="display:none;">


                                                        <option selected="selected" data-sku="1411" value="39329676918844">s - <span class=money>$79.s00 USD</span></option>



                                                        <option data-sku="1412" value="39329676951612">m - <span class=money>$79.00 USD</span></option>



                                                        <option disabled="disabled">
                                                            l - Sold Out
                                                        </option>



                                                        <option data-sku="1414" value="39329677017148">xl - <span class=money>$79.00 USD</span></option>



                                                        <option data-sku="1415" value="39329677049916">xxl - <span class=money>$79.00 USD</span></option>


                                                    </select>
                                                    <style>
                                                        label[for="product-select-option-0"] {
                                                            display: none;
                                                        }

                                                        #product-select-option-0 {
                                                            display: none;
                                                        }

                                                        #product-select-option-0+.custom-style-select-box {
                                                            display: none !important;
                                                        }
                                                    </style>
                                                </div>
                                                <style>
                                                    .product-variant-option .selector-wrapper {
                                                        display: none;
                                                    }
                                                </style>
                                                <div class="product-count style d-flex mb-20">
                                                    <div class="cart-plus-minus product-quantity-action quantity-selector">
                                                        <input type="text" value="1" name="quantity" class="cart-plus-minus-box">
                                                    </div>
                                                    <div class="product-cart-action"><button type="submit" class="ajax-spin-cart btn btn-dark btn--xl" id="AddToCart">
                                                            <a href="<?Php echo $_SERVER['REQUEST_URI']; ?>&AddToCart=<?Php echo $data['id']; ?>"><span class="cart-title" id="AddToCart-btn">Add to cart</span></a>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="addto-whish-list mb-10"><a class="action-wishlist tile-actions--btn flex wishlist-btn wishlist btn flosun-button secondary-btn secondary-border rounded-0" href="javascript: void(0)" button-wishlist data-product-handle="product-dummy-title-4">
                                                        <span class="add-wishlist"><i class="icon-heart"></i>Add to wishlist</span>
                                                    </a><a class="go-to-wishlist btn flosun-button secondary-btn secondary-border rounded-0" href="/pages/wishlist"><i class="icon-heart"></i>Go to wishlist</a>
                                                </div>

                                                <div class="product-footer-meta mb-10">
                                                    <p><span>Category:</span>
                                                        <a href="Search.php?Category=<?php echo $data['Category']; ?>"><?php echo $data['Category']; ?></a>,
                                                    </p>
                                                </div>


                                                <div class="product-footer-meta mb-10">
                                                    <p><span>Tags:</span>

                                                        <?Php
                                                        $exp = explode(',', $data['tags']);

                                                        foreach ($exp as $Tags) {
                                                        ?>
                                                            <a href="Search.php?Tags=<?Php echo $Tags; ?>"><?php echo $Tags; ?></a>,
                                                        <?php  } ?>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg size-guide" id="size_guide" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header justify-content-end">
                                    <button type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table-size-guide  table-center">
                                            <tbody>
                                                <tr>
                                                    <th>INTERNATIONAL</th>
                                                    <th>XS</th>
                                                    <th>S</th>
                                                    <th>M</th>
                                                    <th>L</th>
                                                    <th>XL</th>
                                                    <th>XXL</th>
                                                    <th>XXXL</th>
                                                </tr>
                                                <tr>
                                                    <td>EUROPE</td>
                                                    <td>32</td>
                                                    <td>34</td>
                                                    <td>36</td>
                                                    <td>38</td>
                                                    <td>40</td>
                                                    <td>42</td>
                                                    <td>44</td>
                                                </tr>
                                                <tr>
                                                    <td>US</td>
                                                    <td>0</td>
                                                    <td>2</td>
                                                    <td>4</td>
                                                    <td>6</td>
                                                    <td>8</td>
                                                    <td>10</td>
                                                    <td>12</td>
                                                </tr>
                                                <tr>
                                                    <td>CHEST FIT (INCHES)</td>
                                                    <td>28"</td>
                                                    <td>30"</td>
                                                    <td>32"</td>
                                                    <td>34"</td>
                                                    <td>36"</td>
                                                    <td>38"</td>
                                                    <td>40"</td>
                                                </tr>
                                                <tr>
                                                    <td>CHEST FIT (CM)</td>
                                                    <td>716</td>
                                                    <td>76</td>
                                                    <td>81</td>
                                                    <td>86</td>
                                                    <td>91.5</td>
                                                    <td>96.5</td>
                                                    <td>101.1</td>
                                                </tr>
                                                <tr>
                                                    <td>WAIST FIR (INCHES)</td>
                                                    <td>21"</td>
                                                    <td>23"</td>
                                                    <td>25"</td>
                                                    <td>27"</td>
                                                    <td>29"</td>
                                                    <td>31"</td>
                                                    <td>33"</td>
                                                </tr>
                                                <tr>
                                                    <td>WAIST FIR (CM)</td>
                                                    <td>53.5</td>
                                                    <td>58.5</td>
                                                    <td>63.5</td>
                                                    <td>68.5</td>
                                                    <td>74</td>
                                                    <td>79</td>
                                                    <td>84</td>
                                                </tr>
                                                <tr>
                                                    <td>HIPS FIR (INCHES)</td>
                                                    <td>33"</td>
                                                    <td>34"</td>
                                                    <td>36"</td>
                                                    <td>38"</td>
                                                    <td>40"</td>
                                                    <td>42"</td>
                                                    <td>44"</td>
                                                </tr>
                                                <tr>
                                                    <td>HIPS FIR (CM)</td>
                                                    <td>81.5</td>
                                                    <td>86.5</td>
                                                    <td>91.5</td>
                                                    <td>96.5</td>
                                                    <td>101</td>
                                                    <td>106.5</td>
                                                    <td>111.5</td>
                                                </tr>
                                                <tr>
                                                    <td>SKORT LENGTHS (SM)</td>
                                                    <td>36.5</td>
                                                    <td>38</td>
                                                    <td>39.5</td>
                                                    <td>41</td>
                                                    <td>42.5</td>
                                                    <td>44</td>
                                                    <td>45.5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg shipping_policy" id="shipping_policy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header justify-content-end">
                                    <button type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> </button>
                                </div>
                                <div class="modal-body">
                                    <h4 class="mb-10">Shipping</h4>
                                    <ul class="mb-30">
                                        <li>Complimentary ground shipping within 1 to 7 business days</li>
                                        <li>In-store collection available within 1 to 7 business days</li>
                                        <li>Next-day and Express delivery options also available</li>
                                        <li>Purchases are delivered in an orange box tied with a Bolduc ribbon, with the exception of certain items</li>
                                        <li>See the delivery FAQs for details on shipping methods, costs and delivery times</li>
                                    </ul>
                                    <h4 class="mb-10">Returns And Exchanges</h4>
                                    <ul>
                                        <li>Easy and complimentary, within 14 days</li>
                                        <li>See conditions and procedure in our return FAQs</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-md about_product" id="ask_about_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Have a question?</h5>
                                    <button type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i> </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="ask_about_product"><input type="hidden" name="form_type" value="contact" /><input type="hidden" name="utf8" value="✓" />
                                        <div class="row">
                                            <div class="col-12">


                                            </div>
                                            <div class="col-md-12 mb-40">
                                                <input type="text" required placeholder="Name *" class="" name="contact[name]" id="ContactFormName" value="">
                                            </div>
                                            <div class="col-md-12 mb-40">
                                                <input type="email" required placeholder="Email *" class="" name="contact[email]" id="ContactFormEmail" value="">
                                            </div>
                                            <div class="col-lg-12 mb-40">
                                                <input type="text" id="ContactFormSubject" name="contact[subject]" placeholder="Phone Number *" value="">
                                            </div>
                                            <div class="col-lg-12 mb-40">
                                                <textarea placeholder="Your Message *" class="custom-textarea" name="contact[body]" id="ContactFormMessage"></textarea>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" value="submit" class="pro-cart btn btn-dark btn--xl">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                    <style data-shopify>
                        #section-template--14265465077820__main {
                            padding-top: 80px;
                            padding-bottom: 80px;
                        }

                        @media (min-width: 768px) and (max-width: 991px) {
                            #section-template--14265465077820__main {
                                padding-top: 80px;
                                padding-bottom: 80px;
                            }
                        }

                        @media (max-width: 767px) {
                            #section-template--14265465077820__main {
                                padding-top: 60px;
                                padding-bottom: 60px;
                            }
                        }
                    </style>
                </div>
                <div id="shopify-section-template--14265465077820__single-product-tab" class="shopify-section">
                    <div class="product-tab theme1 bg-white" id="section-template--14265465077820__single-product-tab">
                        <div class="container">
                            <div class="product-tab-nav">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <nav class="product-tab-menu single-product">
                                            <ul class="nav justify-content-center" role=tablist>

                                                <li class="nav-item" style="font-size: 30px;">
                                                    Description
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- product-tab-nav end -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="pro-dec" role="tabpanel">
                                            <div class="single-product-desc">
                                                <?php echo $data['Product Description']; ?>
                                            </div>
                                        </div>


                                        <div class="tab-pane " id="pro-review" role="tabpanel">
                                            <div class="single-product-desc">

                                                <div id="shopify-product-reviews" data-id="6567241023548">
                                                    <style scoped>
                                                        .spr-container {
                                                            padding: 24px;
                                                            border-color: #ECECEC;
                                                        }

                                                        .spr-review,
                                                        .spr-form {
                                                            border-color: #ECECEC;
                                                        }
                                                    </style>

                                                    <div class="spr-container">
                                                        <div class="spr-header">
                                                            <h2 class="spr-header-title">Customer Reviews</h2>
                                                            <div class="spr-summary">

                                                                <span class="spr-starrating spr-summary-starrating">
                                                                    <i class="spr-icon spr-icon-star"></i><i class="spr-icon spr-icon-star"></i><i class="spr-icon spr-icon-star"></i><i class="spr-icon spr-icon-star"></i><i class="spr-icon spr-icon-star-empty"></i>
                                                                </span>
                                                                <span class="spr-summary-caption"><span class='spr-summary-actions-togglereviews'>Based on 1 review</span>
                                                                </span><span class="spr-summary-actions">
                                                                    <a href='#' class='spr-summary-actions-newreview' onclick='SPR.toggleForm(6567241023548);return false'>Write a review</a>
                                                                </span>
                                                            </div>
                                                        </div>

                                                        <div class="spr-content">
                                                            <div class='spr-form' id='form_6567241023548' style='display: none'></div>
                                                            <div class='spr-reviews' id='reviews_6567241023548'></div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="tab-pane " id="comment-box" role="tabpanel">
                                            <div class="single-product-desc fb-comment-box">
                                                <!-- disqus comment box start -->

                                                <!-- disqus comment box end -->
                                                <!-- facebook comment box start -->

                                                <div class="fb-comments" data-href="https://art-furniture-3.myshopify.com/products/product-dummy-title-4" data-width="100%" data-numposts="10"></div>
                                                <div id="fb-root"></div>
                                                <script>
                                                    (function(d, s, id) {
                                                        var js, fjs = d.getElementsByTagName(s)[0];
                                                        if (d.getElementById(id)) return;
                                                        js = d.createElement(s);
                                                        js.id = id;
                                                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                                                        fjs.parentNode.insertBefore(js, fjs);
                                                    }(document, 'script', 'facebook-jssdk'));
                                                </script>

                                                <!-- facebook comment box end -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <style data-shopify>
                        #section-template--14265465077820__single-product-tab {
                            padding-top: 0px;
                            padding-bottom: 80px;
                        }

                        @media (min-width: 768px) and (max-width: 991px) {
                            #section-template--14265465077820__single-product-tab {
                                padding-top: 0px;
                                padding-bottom: 80px;
                            }
                        }

                        @media (max-width: 767px) {
                            #section-template--14265465077820__single-product-tab {
                                padding-top: 0px;
                                padding-bottom: 60px;
                            }
                        }
                    </style>
                    <style>
                    </style>







                </div>
            </main>

            <div id="shopify-section-footer" class="shopify-section">
                <!-- footer strat -->
                <footer class="bg-light theme1 position-relative" id="section-footer">

                    <!-- footer bottom start -->
                    <div class="footer-bottom pt-80 pb-30">
                        <div class="container">
                            <div class="row">


                                <div class="col-12 col-md-6 col-lg-4 mb-30">
                                    <div class="footer-widget mx-w-400">
                                        <div class="footer-logo mb-25">
                                            <a href="/" class="theme-logo">
                                                <img src="//cdn.shopify.com/s/files/1/0016/9626/8348/files/logo_6fdafa66-f2c3-4ba5-be86-599acbf8e48e_300x.png?v=1618308230" alt="Looki - Beauty &amp; Cosmetics eCommerce Shopify Theme">
                                            </a>
                                        </div>

                                        <p class="text mb-30">We are a team of professional designers and developers that create high quality wordpress plugins, Html, React Template.</p>

                                        <div class="social-network">
                                            <ul class="d-flex">

                                                <li>
                                                    <a href="">
                                                        <span class="icon-social-facebook"></span>
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="">
                                                        <span class="icon-social-twitter"></span>
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="">
                                                        <span class="icon-social-youtube"></span>
                                                    </a>
                                                </li>


                                                <li class="mr-0">
                                                    <a href="">
                                                        <span class="icon-social-instagram"></span>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12 col-md-6 col-lg-2 mb-30">
                                    <div class="footer-widget">

                                        <div class="border-bottom cbb1 mb-25">
                                            <div class="section-title">
                                                <h2 class="title">Information</h2>
                                            </div>
                                        </div>

                                        <!-- footer-menu start -->
                                        <ul class="footer-menu">


                                            <li><a href="/pages/about"> About us</a></li>

                                            <li><a href="#"> payment</a></li>

                                            <li><a href="/pages/contact"> Contact us</a></li>

                                            <li><a href="/collections/all"> Stores</a></li>

                                        </ul>
                                        <!-- footer-menu end -->
                                    </div>
                                </div>



                                <div class="col-12 col-md-6 col-lg-2 mb-30">
                                    <div class="footer-widget">

                                        <div class="border-bottom cbb1 mb-25">
                                            <div class="section-title">
                                                <h2 class="title">social Links</h2>
                                            </div>
                                        </div>

                                        <!-- footer-menu start -->
                                        <ul class="footer-menu">


                                            <li><a href="/products/3-variable-product"> New products</a></li>

                                            <li><a href="/collections/onsale"> Best sales</a></li>

                                            <li><a href="/account/login"> Login</a></li>

                                            <li><a href="/account"> My account</a></li>

                                        </ul>
                                        <!-- footer-menu end -->
                                    </div>
                                </div>



                                <div class="col-12 col-md-6 col-lg-4 mb-30">
                                    <div class="footer-widget">

                                        <div class="border-bottom cbb1 mb-25">
                                            <div class="section-title">
                                                <h2 class="title">Newsletter</h2>
                                            </div>
                                        </div>


                                        <p class="text description mb-20">Subcribe to the TheFace mailing list to receive update on new arrivals, special offers and other discount information.</p>

                                        <div class="nletter-form mb-35">
                                            <!-- Newsletter Form -->
                                            <form action="" class="form-inline position-relative" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                                <input type="email" id="mail" class="form-control" value="" name="EMAIL" placeholder="email@example.com">
                                                <button type="submit" id="subscribe" class="btn news-letter-btn text-capitalize">Sign up</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- footer bottom end -->
                    <!-- coppy-right start -->
                    <div class="coppy-right bg-dark py-15">
                        <div class="container">
                            <div class="row">
                                <div class=" coppy-right-2 col-12  col-md-6 col-lg-6  ">
                                    <div class="coppy-right text-left mt-3 mt-md-0">
                                        <p>Copyright © <a href="#" title="#"><strong>HasThemes</strong></a> All Right Reserved.</p>
                                    </div>
                                </div>
                                <div class=" payment-imge col-12 col-md-6 col-lg-6 ">
                                    <div class="imge text-right"><img src="//cdn.shopify.com/s/files/1/0016/9626/8348/files/1_26fcc773-a505-482c-af2d-0e04bb504ca0_large.png?v=1618650787" alt="" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- coppy-right end -->

                </footer>
                <!-- footer end -->


                <style>
                    #block-b0cf4861-325c-4e94-9d33-641963b4af3c .theme-logo img {
                        max-width: 300px;
                    }
                </style>
                <style data-shopify>
                    #section-footer {}

                    @media (min-width: 768px) and (max-width: 991px) {
                        #section-footer {}
                    }

                    @media (max-width: 767px) {
                        #section-footer {}
                    }
                </style>
            </div>

            <!-- Necessary JS -->
            <script src="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/fastclick.min.js?v=29723458539410922371636535190"></script>
            <script src="//cdn.shopify.com/s/files/1/0016/9626/8348/t/9/assets/timber.js?v=147794995694520970281636535239"></script>


            <script>
            </script>
            <!-- modalAddToCart Error -->
            <div class="modal fade ajax-popup error-ajax-popup" id="modalAddToCartError" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog white-modal modal-md">
                    <div class="modal-content ">
                        <div class="modal-body">
                            <div class="modal-content-text">
                                <p class="error_message"></p>
                            </div>
                            <div class="modal-close">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <script>
                $(function() {
                    // Current Ajax request.
                    var currentAjaxRequest = null;
                    // Grabbing all search forms on the page, and adding a .search-results list to each.
                    var searchForms = $('form[action="/search"]').css('position', 'relative').each(function() {
                        // Grabbing text input.
                        var input = $(this).find('input[name="q"]');
                        // Adding a list for showing search results.
                        var offSet = input.position().top + input.innerHeight();
                        $('<ul class="search-results home-two"></ul>').css({
                            'position': 'absolute',
                            'left': '0px',
                            'top': offSet
                        }).appendTo($(this)).hide();
                        // Listening to keyup and change on the text field within these search forms.
                        input.attr('autocomplete', 'off').bind('keyup change', function() {
                            // What's the search term?
                            var term = $(this).val();
                            // What's the search form?
                            var form = $(this).closest('form');
                            // What's the search URL?
                            var searchURL = '/search?type=product&q=' + term;
                            // What's the search results list?
                            var resultsList = form.find('.search-results');
                            // If that's a new term and it contains at least 3 characters.
                            if (term.length > 3 && term != $(this).attr('data-old-term')) {
                                // Saving old query.
                                $(this).attr('data-old-term', term);
                                // Killing any Ajax request that's currently being processed.
                                if (currentAjaxRequest != null) currentAjaxRequest.abort();
                                // Pulling results.
                                currentAjaxRequest = $.getJSON(searchURL + '&view=json', function(data) {
                                    // Reset results.
                                    resultsList.empty();
                                    // If we have no results.
                                    if (data.results_count == 0) {
                                        // resultsList.html('<li><span class="title">No results.</span></li>');
                                        // resultsList.fadeIn(100);
                                        resultsList.hide();
                                    } else {
                                        // If we have results.
                                        $.each(data.results, function(index, item) {
                                            var link = $('<a></a>').attr('href', item.url);
                                            link.append('<span class="thumbnail"><img src="' + item.thumbnail + '" /></span>');
                                            link.append('<span class="title">' + item.title + '</span>');
                                            link.wrap('<li></li>');
                                            resultsList.append(link.parent());
                                        });
                                        // The Ajax request will return at the most 10 results.
                                        // If there are more than 10, let's link to the search results page.
                                        if (data.results_count > 10) {
                                            resultsList.append('<li><span class="title"><a href="' + searchURL + '">See all results (' + data.results_count + ')</a></span></li>');
                                        }
                                        resultsList.fadeIn(100);
                                    }
                                });
                            }
                        });
                    });
                    // Clicking outside makes the results disappear.
                    $('body').bind('click', function() {
                        $('.search-results').hide();
                    });
                });
            </script>

            <!-- Some styles to get you started. -->
            <style>
                .search-results {
                    z-index: 8889;
                    list-style-type: none;
                    width: 190px;
                    margin: 0;
                    padding: 0;
                    background: #ffffff;
                    border: 1px solid #cccccc;
                    border-radius: 0px;
                    -webkit-box-shadow: 0px 4px 7px 0px rgba(0, 0, 0, 0.1);
                    box-shadow: 0px 4px 7px 0px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                }

                .search-results li {
                    display: block;
                    width: 100%;
                    height: 38px;
                    margin: 0;
                    padding: 0;
                    border-top: 1px solid #cccccc;
                    line-height: 38px;
                    overflow: hidden;
                }

                .search-results li:first-child {
                    border-top: none;
                }

                .search-results .title {
                    float: left;
                    width: 140px;
                    padding-left: 8px;
                    white-space: nowrap;
                    overflow: hidden;
                    /* The text-overflow property is supported in all major browsers. */
                    text-overflow: ellipsis;
                    -o-text-overflow: ellipsis;
                    text-align: left;
                    font-size: 12px;
                    line-height: 38px;
                    color: #515151;
                }

                .search-results .title:hover {
                    color: #5a5ac9;
                }

                .search-results .thumbnail {
                    float: left;
                    display: block;
                    width: 32px;
                    height: 32px;
                    margin: 3px 0 3px 3px;
                    padding: 0;
                    text-align: center;
                    overflow: hidden;
                    border-radius: 0px;
                }
            </style>

            <div class="modal fade productModal" id="quickViewModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="qwick-view-left">
                                        <div class="quick-view-learg-img">
                                            <div class="quick-view-tab-content tab-content">
                                                <div class="product-main-image__item">
                                                    <div class="img_box_1"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="qwick-view-right">
                                        <div class="qwick-view-content">
                                            <h1 class="product_title">FROM_JS</h1>
                                            <div class="product-price product-info__price price-part">
                                                <span class="main">jsprice</span>
                                                <span class="price-box__new">jsprice</span>
                                            </div>
                                            <div class="product-rating spr-badge-caption-none">
                                                <div class="quick-view-rating rating">FROM_JS</div>
                                            </div>

                                            <div class="short-description product-des">FROM_JS</div>

                                            <form id="add-item-qv" action="/cart/add" method="post">
                                                <div class="quick-view-select variants select-option-part"></div>
                                                <div class="quickview-plus-minus">
                                                    <div class="cart-plus-minus">
                                                        <input type="text" value="01" name="quantity" class="cart-plus-minus-box">
                                                    </div>
                                                    <div class="quickview-btn-cart">
                                                        <button type="submit" class="addtocartqv theme-default-button">Add to cart</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="close-icon" aria-hidden="true"><i class="fa fa-times-circle"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- END QUICKVIEW PRODUCT -->


            <div class="loading-modal compare_modal">translation missing: en.general.search.loading</div>
            <div class="ajax-success-compare-modal compare_modal" id="moda-compare" tabindex="-1" role="dialog" style="display:none">
                <div class="overlay"> </div>
                <div class="modal-dialog modal-lg">
                    <div class="modal-content content" id="compare-modal">
                        <div class="modal-header">
                            <div class="modal-close">
                                <span class="compare-modal-close">x</span>
                            </div>
                            <h4 class="modal-title">Compare Product</h4>
                        </div>
                        <div class="modal-body">
                            <div class="table-wrapper">
                                <table class="table table-hover table-responsive">
                                    <thead>
                                        <tr class="th-compare">
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-compare">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="shopify-section-recommended" class="shopify-section">
            </div>
        </div>
    </body>

    </html>

<?php } ?>