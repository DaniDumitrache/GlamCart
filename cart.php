<?php
require_once 'assets/php/languages.php';
?>
<html class="js supports-no-cookies sizes customelements history pointerevents postmessage webgl websockets cssanimations csscolumns csscolumns-width csscolumns-span csscolumns-fill csscolumns-gap csscolumns-rule csscolumns-rulecolor csscolumns-rulestyle csscolumns-rulewidth csscolumns-breakbefore csscolumns-breakafter csscolumns-breakinside flexbox picture srcset webworkers" lang="en" style="padding-bottom: 60px;">
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
    <script src="assets/js/popper.min.js?v=146524628635381385751636534428"></script>

    <script src="assets/js/plugins.js?v=130388353295227686641636534428"></script>


    <!-- Your main.js file upload this file -->
    <script src="assets/js/theme.js?v=157086564405513351031636534455"></script>

</head>

<body id="your-shopping-cart" class="template-cart">
    <div class="wrapper">
        <?php require 'assets/php/menu.php'; ?>
        <!-- BREADCRUMBS SETCTION START -->
        <div class="breadcrumbs-section">
            <div class="breadcrumbs overlay-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumbs-inner section-title text-center">

                                <h1 class="breadcrumbs-title title pb-4 text-dark text-capitalize"><?php if (
                                                                                                        isset($_SESSION['cart'])
                                                                                                    ) {
                                                                                                        echo $lang->words['cart']['Your Shopping Cart'];
                                                                                                    } else {
                                                                                                        echo $lang->words['cart']['Your Shopping Cart is empty'];
                                                                                                    } ?></h1>
                                <?php if (!isset($_SESSION['cart'])) { ?>
                                    <p style="margin-bottom: 20px;"><?php echo $lang
                                                                        ->words['cart']['To add products to the basket, please return to the store.']; ?></p>
                                    <a href="checkouts/index.php" class="btn btn--lg btn-primary"><?php echo $lang
                                                                                                        ->words['cart']['Go back to the store']; ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMBS SETCTION END -->
        <div id="shopify-section-breadcrumb" class="shopify-section">
            <style></style>


        </div>
        <?php if (isset($_SESSION['cart'])) { ?>
            <main>
                <div id="shopify-section-template--14265434079292__main" class="shopify-section">
                    <!-- product tab start -->
                    <section class="whish-list-section theme1 cart-page" id="section-template--14265434079292__main">
                        <form action="" method="post" novalidate="" class="cart">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">

                                        <h3 class="title mb-30 pb-25 text-capitalize"><?php echo $lang
                                                                                            ->words['cart']['Your Cart Items']; ?></h3>

                                        <div class="cart-table table-responsive">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th class="text-center pro-thumbnail" scope="col"><?php echo $lang
                                                                                                                ->words['cart']['Image']; ?></th>
                                                        <th class="text-center pro-title" scope="col"><?php echo $lang
                                                                                                            ->words['cart']['Product']; ?></th>
                                                        <th class="text-center pro-quantity" scope="col"><?php echo $lang
                                                                                                                ->words['cart']['Quantity']; ?></th>
                                                        <th class="text-center pro-price" scope="col"><?php echo $lang
                                                                                                            ->words['cart']['Price']; ?></th>
                                                        <th class="text-center pro-remove" scope="col"><?php echo $lang
                                                                                                            ->words['cart']['Remove']; ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    require 'assets/php/cart.php';
                                                    require 'assets/php/currency.php';

                                                    $curr = new Convert();
                                                    $cart = new Cart();

                                                    $cart->Cart();
                                                    $cart->GetCartProduct(
                                                        $_SESSION['cart']
                                                    );
                                                    $cart->CalculateCartTotal(
                                                        $_SESSION['cart']
                                                    );
                                                    $total =
                                                        $cart->Product_Price_Result['Total'];
                                                    $SubTotal =
                                                        $cart->Product_Price_Result['SubTotal'];

                                                    $DeliveryCost = $cart->Product_Price_Result['Delivery Cost'];

                                                    $curr = new Convert();
                                                    ?>

                                                    <?php foreach ($cart->data
                                                        as $data) { ?>
                                                        <tr id="Tb">
                                                            <th class="text-center pro-thumbnail" scope="row">
                                                                <a href=""><?Php $image = explode(',', $data['image_id']); ?><img src="GetImage.php?ImageId=<?php echo $image[0]; ?>" alt="The Cosmetics and Beauty brand Shoppe - red"></a>
                                                            </th>
                                                            <td class="text-center pro-title">
                                                                <a href=""><?php echo $data['Product Name']; ?></a>
                                                            </td>
                                                            <td class="text-center pro-quantity">
                                                                <div class="product-quantity">
                                                                    <style>

                                                                    </style>
                                                                    <input id="Quantity" type="number" value="1" data-productId="<?php echo $data['id']; ?>">
                                                                    <span id="QuantityRemove" class="dec qtybtn"> - </span>
                                                                    <span id="QuantityAdd" class="inc qtybtn"> + </span>
                                                                </div>
                                                            </td>
                                                            <td class="text-center pro-price">
                                                                <span class="whish-list-price amount"><span class="money"><?php echo $curr->GetConvertPrice(
                                                                                                                                 $data['Product Price'] - ($data['Product Price'] * ($data['Discount'] / 100))
                                                                                                                            ); ?>
                                                                        <?php
                                                                        // echo $AccountCurency;
                                                                        ?></span></span>
                                                            </td>

                                                            <td class="text-center pro-remove">
                                                                <button id="btn"><i class="fa fa-trash" style="font-size: 25px;"></i></button>
                                                            </td>
                                                        </tr>
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

                                                        <script>
                                                            ProductID = $('#Tb').attr('data-productId');
                                                            Quantity = $('[data-productId=<?php echo $data['id']; ?>]');
                                                            console.log(Quantity)

                                                            Quantity.change(function() {
                                                                if (Quantity.val() > <?php echo $data['stock']; ?>) {
                                                                    Quantity.val(<?php echo $data['stock']; ?>);

                                                                    Quantity.css('color', 'red')
                                                                    $('.product-quantity').css('border', '1px solid red')

                                                                    setInterval(() => {
                                                                        Quantity.css('color', '')
                                                                        $('.product-quantity').css('border', '')
                                                                    }, 6000);

                                                                }
                                                            });

                                                            $('[id^=QuantityAdd]').click(function() {
                                                                val = Quantity.val();
                                                                stock = <?php echo $data['stock']; ?>;
                                                                stock--;
                                                                val++

                                                                if (Quantity.val() <= stock) {
                                                                    Quantity.val(val);
                                                                }
                                                            })

                                                            $('[id^=QuantityRemove]').click(function() {
                                                                val = Quantity.val();

                                                                let x = val;
                                                                x--;

                                                                if (x >= 0) {
                                                                    Quantity.val(x);
                                                                    Quantity.css('color', '')
                                                                    $('.product-quantity').css('border', '')
                                                                }
                                                            })
                                                        </script>
                                                    <?php } ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="cart-buttons">
                                            <input class="btn btn--lg btn-primary mr-3" name="update" type="submit" value="<?php echo $lang
                                                                                                                                ->words['cart']['Update Cart']; ?>">
                                            <a class="btn btn--lg btn-primary mr-3" href="/"><?php echo $lang
                                                                                                    ->words['cart']['Continue Shopping']; ?></a>
                                            <a class=" btn btn--lg btn-primary mr-3" href="?EmptyCart"><?php echo $lang
                                                                                                            ->words['cart']['Clear Cart']; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="check-out-section pt-80">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="d-flex">
                                                <input type="text" id="Cupon" style="border: 0 none; line-height: 60px; width: 100%; font-size: 14px; background: transparent; border: 1px solid #ebebeb; padding: 10px 50px 10px 10px; height: 60px; color: #000; text-transform: capitalize;" placeholder="Cupon">
                                                <button class="btn btn-primary" id="ApplyCupon">Apply</button>
                                            </div>
                                            <div class="error" id="CuponError" style="display: none;"></div>
                                        </div>
                                        <div class="col-lg-12  mt-4 mt-lg-0">
                                            <div class="your-order-area">
                                                <div class="your-order-wrap gray-bg-4">
                                                    <div class="your-order-product-info">
                                                        <div class="your-order-top">
                                                            <h3>Cart Totals</h3>
                                                        </div>
                                                        <!--
                                                           <div class="your-order-bottom">
                                                            <ul>
                                                                <li class="order-total">Delivery Cost</li>
                                                                <li>
                                                                    <span class="amount">
                                                                        <span id="bk-cart-subtotal-price">
                                                                            <span class="money" id="DeliveryCost">
                                                                            <?php echo $curr->GetConvertPrice($DeliveryCost); ?>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                     -->
                                                        <div class="your-order-bottom">
                                                            <ul>
                                                                <li class="your-order-shipping">Subtotal</li>
                                                                <li>
                                                                    <span class="amount">
                                                                        <span id="bk-cart-subtotal-price">
                                                                            <span class="money" id="CartSubTotal">
                                                                                <?php echo $curr->GetConvertPrice($SubTotal); ?>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="your-order-total mb-0">
                                                            <ul>
                                                                <li class="order-total">Total</li>
                                                                <li>
                                                                    <span class="amount">
                                                                        <span id="bk-cart-subtotal-price">
                                                                            <span class="money" id="CartTotal">
                                                                                <?php echo $curr->GetConvertPrice($total); ?>
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="Place-order mt-25">
                                                    <a href="checkouts/index.php" class="btn btn--lg btn-primary"><?php echo $lang
                                                                                                                        ->words['cart']['Proceed to Checkout']; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <style data-shopify="">
                        #section-template--14265434079292__main {
                            padding-top: 80px;
                            padding-bottom: 80px;
                        }

                        @media (min-width: 768px) and (max-width: 991px) {
                            #section-template--14265434079292__main {
                                padding-top: 80px;
                                padding-bottom: 80px;
                            }
                        }

                        @media (max-width: 767px) {
                            #section-template--14265434079292__main {
                                padding-top: 60px;
                                padding-bottom: 60px;
                            }
                        }
                    </style>
                    <!--[if (gt IE 9)|!(IE)]><!-->

                    <!--<![endif]-->


                    <style>
                        @media (max-width: 767px) {

                            /* Force table to not be like tables anymore */
                            .cart-table table,
                            .cart-table thead,
                            .cart-table tbody,
                            .cart-table th,
                            .cart-table td,
                            .cart-table tr {
                                display: block;
                            }

                            /* Hide table headers (but not display: none;, for accessibility) */
                            .cart-table thead tr {
                                position: absolute;
                                top: -9999px;
                                left: -9999px;
                            }

                            /*.cart-table tr { border: 1px solid #ccc; }*/

                            .cart-table td {
                                /* Behave  like a "row" */
                                border: none;
                                border-bottom: 1px solid #eee;
                                position: relative;
                                padding-left: 50%;
                            }

                            .cart-table td:before {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                padding-right: 0;
                                white-space: nowrap;
                            }

                            /*
      Label the data
      
      td:nth-of-type(1):before { content: "Image"; }
      td:nth-of-type(2):before { content: "Product"; }
      td:nth-of-type(3):before { content: "Price"; }
      td:nth-of-type(4):before { content: "Quantity"; }
      td:nth-of-type(5):before { content: "Total"; }
      td:nth-of-type(6):before { content: "Remove"; }
      */
                            .cart-table table tbody tr td.pro-thumbnail {
                                width: auto;
                            }

                            .cart-table table tbody tr td.pro-thumbnail {
                                width: auto;
                                max-width: 100%;
                                min-width: 100%;
                                text-align: center;
                            }

                            .cart-table table tbody tr td.pro-thumbnail a {
                                display: block;
                                min-width: unset;
                                width: auto;
                            }

                            .cart-table table tbody tr td.pro-thumbnail a img {
                                width: auto;
                                max-width: 100%;
                            }

                            .cart-table table tbody tr td.pro-title {
                                width: auto;
                            }

                            .cart-table table tbody tr td.pro-price {
                                width: auto;
                            }

                            .cart-table table tbody tr td.pro-quantity {
                                width: auto;
                            }

                            .cart-table table tbody tr td.pro-subtotal {
                                width: auto;
                            }

                            .cart-table table tbody tr td.pro-remove {
                                width: auto;
                            }

                            .cart-table table tbody tr td.pro-remove a {
                                width: auto;
                            }

                            .cart-table table tbody tr td {
                                padding: 5px 5px;
                            }

                            .cart-table td.pro-thumbnail a {
                                border: 0px solid #eee;
                            }

                            .cart-table table tbody tr td {
                                border-bottom: 0px solid #ddd;
                            }
                        }
                    </style>





                </div>
            </main>
        <?php } ?>

        <?php require 'assets/php/footer.php'; ?>
        <!-- Necessary JS -->


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

                                        <form id="add-item-qv" action="" method="post">
                                            <div class="quick-view-select variants select-option-part"></div>
                                            <div class="quickview-plus-minus">
                                                <div class="cart-plus-minus">
                                                    <div class="dec qtybutton">-</div>
                                                    <input type="text" value="01" name="quantity" class="cart-plus-minus-box">
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                                <div class="quickview-btn-cart">
                                                    <button type="submit" class="addtocartqv theme-default-button">Add
                                                        to cart</button>
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





        <div class="quickViewModal_info" style="display: none;">
            <div class="button">Add to cart</div>
            <div class="button_added">Added</div>
            <div class="button_error">Limit Products</div>
            <div class="button_wait">Wait..</div>
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
    </div>
</body>
<script>
    Load = {
        currency: "<?php echo $_SESSION['curency']; ?>",
        Total: <?php echo $total; ?>,
        SubTotal: <?php echo $SubTotal; ?>
    }

    ClientIp = "<?php echo $_SERVER['REMOTE_ADDR']; ?>";
</script>
<script src="assets/js/cart.js"></script>

</html>