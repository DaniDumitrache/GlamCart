<?php
require_once 'social.php';
$social = new Social;
$social->GetSocialData(); ?> 
<div id="shopify-section-header" class="shopify-section">
  <!-- header start -->
  <header id="section-header">

    <!-- header top start -->
    <div class="header-top theme1 bg-dark py-15">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-sm-6 order-last order-sm-first">
            <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
              <div class="social-network2">
                <ul class="d-flex">

                  <?php if (!empty($social->SocialData[0]['facebook'])) : ?>
                    <li>
                      <a href="<?php echo $social->SocialData[0]['facebook']; ?>">
                        <span class="fa-brands fa-facebook-f"></span>
                      </a>
                    </li>
                  <?php endif; ?>

                  <?php if (!empty($social->SocialData[0]['twitter'])) : ?>
                    <li>
                      <a href="<?php echo $social->SocialData[0]['twitter']; ?>">
                        <span class="fa-brands fa-twitter"></span>
                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if (!empty($social->SocialData[0]['youtube'])) : ?>
                    <li>
                      <a href="<?php echo $social->SocialData[0]['youtube']; ?>">
                        <span class="fa-brands fa-youtube"></span>
                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if (!empty($social->SocialData[0]['instagram'])) : ?>
                    <li>
                      <a href="<?php echo $social->SocialData[0]['instagram']; ?>">
                        <span class="fa-brands fa-instagram"></span>
                      </a>
                    </li>
                  <?php endif; ?>
                  <?php if (!empty($social->SocialData[0]['TikTok'])) : ?>
                    <li class="mr-0">
                      <a href="<?php echo $social->SocialData[0]['TikTok']; ?>">
                        <span class="fa-brands fa-tiktok"></span>
                      </a>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
              <?php if (!empty($social->SocialData[0]['phone'])) : ?>
                <div class="media static-media ml-4 d-flex align-items-center">
                  <div class="media-body">

                    <div class="phone">
                      <a href="tel:<?php echo $social->SocialData[0]['phone']; ?>" class="text-white">
                        <i class="fa-solid fa-phone mr-1"></i>
                        <?php echo $social->SocialData[0]['phone']; ?>
                      </a>
                    </div>

                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-6 col-sm-6">
            <nav class="navbar-top pb-2 pb-sm-0 position-relative">
              <ul class="d-flex justify-content-center justify-content-md-end align-items-center">

                <?php if (isset($_SESSION['AuthToken'])) { ?>
                  <li>
                    <a href="#"><?php if (isset($lang->words)) {
                                  echo $lang->words['header']['settings'];
                                } ?> <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="header-dropdown-menu">
                      <li><a href="account.php">my account</a></li>
                      <li><a href="?logout">Logout</a></li>
                    </ul>
                  </li>
                <?php } else { ?>
                  <li><a href="login.php"><?php if (isset($lang->words)) {
                                            echo $lang->words['header']['Sign In'];
                                          } ?></a></li>
                <?php } ?>

                <li class="switcher-currency-trigger currency">
                  <a href="#" class="currency-trigger"><span class="current-currency"><?php if (
                                                                                        isset($lang->words)
                                                                                      ) {
                                                                                        echo $lang->words['header']['language'];
                                                                                      } ?></span> <i class="fa-solid fa-angle-down"></i></a>

                  <ul class="header-dropdown-menu switcher-dropdown">
                    <li><a href="?lang=ro" style="cursor: pointer">Romanian</a></li>
                    <li><a href="?lang=en" style="cursor: pointer">English</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- header top end -->


    <!-- header-middle satrt -->
    <div id="sticky" class="header-middle theme1 py-15 py-lg-0">
      <div class="container position-relative">
        <div class="row align-items-center">
          <div class="col-6 col-lg-2 col-xl-2">
            <div class="logo">
              <a href="/" class="theme-logo">
                monchercosmetics
              </a>
            </div>
          </div>
          <div class="col-xl-8 col-lg-7 d-none d-lg-block">
            <ul class="main-menu d-flex justify-content-center">
              <li><a href="/"><?php if (isset($lang->words)) {
                                echo $lang->words['header']['HOME'];
                              } ?></a>

              </li>
              <li class="position-static">
                <a href=""><?php if (isset($lang->words)) {
                              echo $lang->words['header']['Products'];
                            } ?> <i class="fa-solid fa-angle-down"></i></a>
                <ul class="mega-menu row">
                  <li class="col-3">
                    <ul>
                      <li class="mega-menu-title"><span>Fata</span>
                        <ul>
                          <li><a href="//collections/all/?preview_theme_id=120222679100">
                              Ochi</a></li>
                          <li><a href="//collections/all/?preview_theme_id=120272977980">
                              Sprancene</a></li>
                          <li><a href="//collections/all/?preview_theme_id=120222679100">
                              Buze</a></li>
                          <li><a href="//collections/all/?preview_theme_id=120272977980">
                              Fata</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="col-3">
                    <ul>
                      <li class="mega-menu-title"><span>Accesori</span>
                        <ul>
                          <li><a href="//collections/all?view=list/?preview_theme_id=120222679100">Pensule</a></li>
                          <li><a href="//collections/all?view=list/?preview_theme_id=120222679100">Demachiant</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="col-3">
                    <ul>
                      <li class="mega-menu-title"><span>Altele</span>
                        <ul>
                          <li><a href="/products/5-simple-product">Peruci</a></li>
                          <li><a href="/products/3-variable-product">Parfum</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="col-3">
                    <ul>
                      <li class="mega-menu-title"><span>Must Have</span>
                        <ul>
                          <li><a href="/pages/about">Essentials</a></li>
                          <li><a href="/cart">Curs</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="OnDiscount.php"><?php if (isset($lang->words)) {
                                              echo $lang->words['header']['SALE'];
                                            } ?> </a></li>
              <li><a href="contact.php"><?php if (isset($lang->words)) {
                                          echo $lang->words['header']['CONTACT US'];
                                        } ?></a></li>
            </ul>


          </div>
          <div class="col-6 col-lg-3 col-xl-2">
            <!-- search-form end -->
            <div class="d-flex align-items-center justify-content-end">
              <!-- static-media end -->
              <div class="cart-block-links theme1 d-none d-sm-block">
                <ul class="d-flex">

                  <li>
                    <a href="javascript:void(0)" class="search search-toggle">
                      <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                  </li>


                  <li>
                    <a href="wishlist.php">
                      <span class="position-relative">
                        <i class="fa-regular fa-heart"></i>
                        <span class="badge cbdg1 bigcounter"><?php if (
                                                                isset($_SESSION['wishlist']) &&
                                                                !empty($_SESSION['wishlist'])
                                                              ) {
                                                                echo count($_SESSION['wishlist']);
                                                              } ?></span>
                      </span>
                    </a>
                  </li>


                  <li class="mr-xl-0 cart-block position-relative">
                    <a href="cart.php">
                      <span class="position-relative">
                        <i class="fa-solid fa-cart-shopping"></i><span class="badge cbdg1 bigcounter"><?php if (
                                                                                                        isset($_SESSION['cart']) &&
                                                                                                        !empty($_SESSION['cart'])
                                                                                                      ) {
                                                                                                        echo count($_SESSION['cart']);
                                                                                                      } ?></span>
                      </span>
                    </a>
                  </li>

                  <!-- cart block end -->
                </ul>
              </div>

              <div class="mobile-menu-toggle theme1 d-lg-none">
                <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                  <svg viewbox="0 0 700 550">
                    <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                    <path d="M300,320 L540,320" id="middle"></path>
                    <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318)"></path>
                  </svg>
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- header-middle end -->

  </header>
  <!-- header end -->

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
              <a href="/cart"><i class="icon-bag"></i> Cart <span>123</span>
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



              <li><a href="//?preview_theme_id=120916508732">Home 1</a></li>




              <li><a href="//?preview_theme_id=120916705340">Home 2</a></li>




              <li><a href="//?preview_theme_id=120916869180">Home RTL </a></li>


            </ul>
          </li>



          <li>
            <a href="/collections/all"><span class="menu-text">shop</span></a>
            <ul class="offcanvas-submenu">
              <li>
                <a href=""><span class="menu-text">Shop Grid</span></a>
                <ul class="offcanvas-submenu">
                  <li><a href="//collections/all/?preview_theme_id=120222679100">Shop
                      Grid 3 Column</a></li>
                  <li><a href="//collections/all/?preview_theme_id=120272977980">Shop
                      Grid 4 Column</a></li>
                  <li><a href="//collections/all/?preview_theme_id=120222679100">Shop
                      Grid Left Sidebar</a></li>
                  <li><a href="//collections/all/?preview_theme_id=120272977980">Shop
                      Grid Right Sidebar</a></li>
                </ul>
              </li>
              <li>
                <a href=""><span class="menu-text">Shop List</span></a>
                <ul class="offcanvas-submenu">
                  <li><a href="//collections/all?view=list/?preview_theme_id=120222679100">Shop
                      List</a></li>
                  <li><a href="//collections/all?view=list/?preview_theme_id=120222679100">Shop
                      List Left Sidebar</a></li>
                  <li><a href="//collections/all?view=list/?preview_theme_id=120272977980">Shop
                      List Right Sidebar</a></li>
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




              <li><a href="wishlist.php">Wishlist Page</a></li>


            </ul>
          </li>




          <li>
            <a href="/blogs/news"><span class="menu-text">Blog </span></a>
            <ul class="offcanvas-submenu">



              <li>
                <a href="#"><span class="menu-text">Blog Grid</span></a>
                <ul class="offcanvas-submenu">

                  <li><a href="//blogs/news/?preview_theme_id=120222679100">Blog
                      Grid 3 column</a></li>

                  <li><a href="//blogs/news/?preview_theme_id=120222679100">Blog
                      Grid 4 column</a></li>

                  <li><a href="//blogs/news/?preview_theme_id=120222679100">Blog
                      Grid Left Sidebar</a></li>

                  <li><a href="//blogs/news/?preview_theme_id=120222679100">Blog
                      Grid Right Sidebar</a></li>

                </ul>
              </li>




              <li>
                <a href="#"><span class="menu-text">Blog List</span></a>
                <ul class="offcanvas-submenu">

                  <li><a href="//blogs/news/?preview_theme_id=120272977980">Blog
                      List Left Sidebar</a></li>

                  <li><a href="//blogs/news/?preview_theme_id=120272977980">Blog
                      List Right Sidebar</a></li>

                </ul>
              </li>




              <li>
                <a href="/blogs/news/it-is-a-long-established-fact-that-a-reader-will-1"><span class="menu-text">Blog Single</span></a>
                <ul class="offcanvas-submenu">

                  <li><a href="/blogs/news/the-standard-chunk-of-lorem-ipsum-used-since-1">Single Blog</a></li>

                  <li><a href="/blogs/news/the-standard-chunk-of-lorem-ipsum-used-since">Blog Single Left
                      Sidebar</a></li>

                  <li><a href="//blogs/news/it-is-a-long-established-fact-that-a-reader-will-1/?preview_theme_id=120272977980">Blog
                      Single Right Sidbar</a></li>

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
  <!-- search-box and overlay start -->
  <div class="overlay search-bar">
    <div class="scale"></div>
    <form action="search.php?query=" method="get" class="search-box" role="search">

      <input type="search" name="query" value="" placeholder="Search our store" aria-label="Search our store">
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
</div>