<?php require_once 'languages.php'; ?>
<?php $lang = new lang(); ?>
<style>
    .success {
        color: green;
        font-size: 18px;
    }

    .error {
        color: red;
        font-size: 18px;
    }
</style>
<footer class="bg-light theme1 position-relative" id="section-footer">

    <!-- footer bottom start -->
    <div class="footer-bottom pt-80 pb-30">
        <div class="container">
            <div class="row">


                <div class="col-12 col-md-6 col-lg-4 mb-30">
                    <div class="footer-widget mx-w-400">
                        <div class="footer-logo mb-25">
                            <a href="/" class="theme-logo">
                            monchercosmetics
                            </a>
                        </div>

                        <p class="text mb-30">We are a team of professional designers and developers that create high quality
                            wordpress plugins, Html, React Template.</p>

                        <div class="social-network">
                            <ul class="d-flex">

                    <li>
                    <a href="#">
                      <span class="fa-brands fa-facebook-f"></span>
                    </a>        
                  </li>


                  <li>
                    <a href="#">
                      <span class="fa-brands fa-twitter"></span>
                    </a>
                  </li>


                  <li>
                    <a href="#">
                      <span class="fa-brands fa-youtube"></span>
                    </a>
                  </li>


                  <li class="mr-0">
                    <a href="">
                      <span class="fa-brands fa-instagram"></span>
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
                                <h2 class="title"><?php echo $lang->words[
                                    'footer'
                                ]['Information']; ?></h2>
                            </div>
                        </div>

                        <!-- footer-menu start -->
                        <ul class="footer-menu">


                            <li><a href="/pages/about"> <?php echo $lang->words[
                                'footer'
                            ]['About Us']; ?></a></li>

                            <li><a href="#"> <?php echo $lang->words['footer'][
                                'Payment'
                            ]; ?></a></li>

                            <li><a href="/pages/contact"> <?php echo $lang
                                ->words['footer']['Contact Us']; ?></a></li>
                        </ul>
                        <!-- footer-menu end -->
                    </div>
                </div>



                <div class="col-12 col-md-6 col-lg-2 mb-30">
                    <div class="footer-widget">

                        <div class="border-bottom cbb1 mb-25">
                            <div class="section-title">
                                <h2 class="title"> <?php echo $lang->words[
                                    'footer'
                                ]['Social Links']; ?></h2>
                            </div>
                        </div>

                        <!-- footer-menu start -->
                        <ul class="footer-menu">


                            <li><a href="/products/3-variable-product"> <?php echo $lang
                                ->words['footer']['New Products']; ?></a></li>

                            <li><a href="/collections/onsale"> <?php echo $lang
                                ->words['footer']['Best Sales']; ?></a></li>

                            <li><a href="/account/login"> <?php echo $lang
                                ->words['footer']['Login']; ?></a></li>

                            <li><a href="/account"> <?php echo $lang->words[
                                'footer'
                            ]['My Account']; ?></a></li>

                        </ul>
                        <!-- footer-menu end -->
                    </div>
                </div>



                <div class="col-12 col-md-6 col-lg-4 mb-30">
                    <div class="footer-widget">

                        <div class="border-bottom cbb1 mb-25">
                            <div class="section-title">
                                <h2 class="title"><?php echo $lang->words[
                                    'footer'
                                ]['Newsletter']; ?></h2>
                            </div>
                        </div>


                        <p class="text description mb-20"><?php echo $lang
                            ->words['footer'][
                            'Subcribe to the TheFace mailing list to receive update on new arrivals, special offers and other discount information.'
                        ]; ?></p>

                        <div class="nletter-form mb-35">
                            <!-- Newsletter Form -->
                            <form action="" class="form-inline position-relative" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                <input type="email" class="form-control" value="" name="NewsletterEmail" id="NewsletterEmail" placeholder="email@example.com">
                                <button type="submit" id="subscribe" class="btn news-letter-btn text-capitalize"><?php echo $lang
                                    ->words['footer']['Subscribe']; ?></button>
                            </form>
                            <span id="NewsletterMessage" class="ml-4"></span>
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
                        <p>Copyright © <strong>monchercosmetics</strong> All Right Reserved.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- coppy-right end -->

</footer>