<?php
require '../assets/php/session.php';

if (isset($_SESSION['cart']) && !isset($_SESSION['AuthToken'])) {
  header('location: ../account/login.php');
}

if (!isset($_SESSION['cart']) && isset($_SESSION['AuthToken'])) {
  header('location: ../cart.php');
}

require '../assets/php/cart.php';
require '../assets/php/currency.php';
require '../assets/php/languages.php';

$cart = new Cart();
$lang = new lang();
$curr = new Convert();

$cart->Cart();
$cart->CalculateCartTotal($_SESSION['cart']);
$cart->GetCartProduct($_SESSION['cart']);

$total = $cart->Product_Price_Result['Total'];
$SubTotal = $cart->Product_Price_Result['SubTotal'];
$DeliveryCost = $cart->Product_Price_Result['Delivery Cost'];
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr" class="no-js windows chrome desktop page--no-banner page--logo-main page--show page--show card-fields">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
  <meta name="referrer" content="origin">

  <title> Information - Looki - Beauty &amp; Cosmetics eCommerce Shopify Theme - Checkout</title>

  <link rel="stylesheet" href="//cdn.shopify.com/app/services/1696268348/assets/120916508732/checkout_stylesheet/v2-ltr-edge-64f55ef1fc3d36f69b4eb1a3ef0c13f3-4260" media="all" />

  <script src="//cdn.shopify.com/shopifycloud/shopify/assets/checkout-f735835b5b69ad9618c7e8daf268ddddc10110c5d423a121d68fdc8ba98b9ace.js" crossorigin="anonymous"></script>
</head>

<body>
  <a href="#main-header" class="skip-to-content">
    Skip to content
  </a>




  <header class="banner" data-header role="banner">
    <div class="wrap">

      <a class="logo logo--left" href="//"></a>

      <h1 class="visually-hidden">
        Information
      </h1>


    </div>
  </header>

  <aside role="complementary">
    <button class="order-summary-toggle order-summary-toggle--show shown-if-js" aria-expanded="false" aria-controls="order-summary" data-drawer-toggle="[data-order-summary]">
      <span class="wrap">
        <span class="order-summary-toggle__inner">
          <span class="order-summary-toggle__icon-wrapper">
            <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__icon">
              <path d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z" />
            </svg>
          </span>
          <span class="order-summary-toggle__text order-summary-toggle__text--show">
            <span>Show order summary</span>
            <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000">
              <path d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z" />
            </svg>
          </span>
          <span class="order-summary-toggle__text order-summary-toggle__text--hide">
            <span>Hide order summary</span>
            <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown" fill="#000">
              <path d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z" />
            </svg>
          </span>
          <dl class="order-summary-toggle__total-recap total-recap" data-order-summary-section="toggle-total-recap">
            <dt class="visually-hidden"><span>Sale price</span></dt>
            <dd>
              <span class="order-summary__emphasis total-recap__final-price skeleton-while-loading" data-checkout-payment-due-target="3900"><?php echo $curr->GetConvertPrice(
                                                                                                                                              $total
                                                                                                                                            ); ?></span>
            </dd>
          </dl>
        </span>
      </span>
    </button>
  </aside>



  <div class="content" data-content>
    <div class="wrap">
      <div class="main">
        <header class="main__header" role="banner">

          <a class="logo logo--left" href="//" style="font-size: 20px; font-weight:bold;">monchercosmetics</a>

          <h1 class="visually-hidden">
            Information
          </h1>


          <nav aria-label="Breadcrumb">
            <ol class="breadcrumb " role="list">
              <li class="breadcrumb__item breadcrumb__item--completed">
                <a class="breadcrumb__link" href="//cart"><?php echo $lang
                                                            ->words['checkout']['Cart']; ?></a>
                <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumb__chevron-icon" aria-hidden="true" focusable="false">
                  <use xlink:href="#chevron-right" />
                </svg>
              </li>

              <li class="breadcrumb__item breadcrumb__item--current" aria-current="step">
                <span class="breadcrumb__text"><?php echo $lang->words['checkout']['Information']; ?></span>
                <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumb__chevron-icon" aria-hidden="true" focusable="false">
                  <use xlink:href="#chevron-right" />
                </svg>
              </li>
              <li class="breadcrumb__item breadcrumb__item--blank">
                <span class="breadcrumb__text"><?php echo $lang->words['checkout']['Shipping']; ?></span>
                <svg class="icon-svg icon-svg--color-adaptive-light icon-svg--size-10 breadcrumb__chevron-icon" aria-hidden="true" focusable="false">
                  <use xlink:href="#chevron-right" />
                </svg>
              </li>
              <li class="breadcrumb__item breadcrumb__item--blank">
                <span class="breadcrumb__text"><?php echo $lang->words['checkout']['Payment']; ?></span>
              </li>
            </ol>
          </nav>



          <div class="shown-if-js" data-alternative-payments>
          </div>



        </header>
        <main class="main__content" role="main">

          <div class="step" data-step="contact_information" data-last-step="false">
            <form class="edit_checkout" novalidate="novalidate" action="" accept-charset="UTF-8" method="post">


              <div class="step__sections">

                <div class="section section--contact-information">
                  <?php if (!isset($_SESSION['AuthToken'])) { ?>
                    <div class="section__header">
                      <div class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
                        <h2 class="section__title layout-flex__item layout-flex__item--stretch" id="main-header" tabindex="-1">
                          <?php echo $lang->words['checkout']['Contact information']; ?>
                        </h2>

                        <p class="layout-flex__item">
                          <?php echo $lang->words['checkout']['Already have an account?']; ?>
                          <a href="//account/login?checkout_url=https%3A%2F%2Fart-furniture-3.myshopify.com%2F1696268348%2Fcheckouts%2F8d353df03d5fb5de84fd2ae6286b62ec%3Fkey%3D77500108787013fd33a9f2533314e2fc%26step%3Dcontact_information">
                            <?php echo $lang->words['checkout']['Login']; ?>
                          </a>
                        </p>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="section__content" data-section="customer-information" data-shopify-pay-validate-on-load="false">
                    <div class="fieldset">
                      <div class="field field--email_or_phone">
                        <label class="field__label" for="checkout_email_or_phone"><?php echo $lang
                                                                                    ->words['checkout']['Phone number']; ?></label>
                        <div class="field__input-wrapper">
                          <input value="" placeholder="<?php echo $lang->words['checkout']['Phone number']; ?>" autocapitalize="off" class="field__input" size="30" type="email" id="PhoneNumber" />
                        </div>
                      </div>
                    </div>


                    <div class="info__message hidden" aria-live="polite" info-accept-sms-messages>
                      We’ll send you an order receipt and recurring shipping updates via text message. Reply STOP to
                      unsubscribe. Reply HELP for help. Message frequency varies. Msg &amp; data rates may apply. View
                      our Privacy policy and Terms of service.
                    </div>
                  </div>
                </div>


                <div class="section section--shipping-address" data-shipping-address>
                  <div class="section__header">
                    <h2 class="section__title" id="section-delivery-title">
                      <?php echo $lang->words['checkout']['Shipping address']; ?>
                    </h2>
                  </div>


                  <div class="section__content">
                    <div class="fieldset">
                      <div class="address-fields" data-address-fields>



                        <div data-address-field="address1" data-autocomplete-field-container="true" class="field field--required">
                          <label class="field__label" for="checkout_shipping_address_address1"><?php echo $lang
                                                                                                  ->words['checkout']['country/region']; ?></label>
                          <div class="field__input-wrapper">
                            <input placeholder="<?php echo $lang->words['checkout']['country/region']; ?>" autocomplete="shipping address-line1" autocorrect="off" data-backup="address1" class="field__input" aria-required="true" size="30" type="text" id="CountryAndRegion" />

                            <p class="field__additional-info visually-hidden" data-address-civic-number-warning>
                              <svg class="icon-svg icon-svg--size-16 field__message__icon" aria-hidden="true" focusable="false">
                                <use xlink:href="#info" />
                              </svg>
                              Add a house number if you have one
                            </p>
                          </div>
                        </div>
                        <div data-address-field="address1" data-autocomplete-field-container="true" class="field field--required">
                          <label class="field__label" for="checkout_shipping_address_address1"><?php echo $lang
                                                                                                  ->words['checkout']['Address']; ?></label>
                          <div class="field__input-wrapper">
                            <input placeholder="<?php echo $lang->words['checkout']['Address']; ?>" autocomplete="shipping address-line1" autocorrect="off" data-backup="address1" class="field__input" aria-required="true" size="30" type="text" id="Adress" />

                            <p class="field__additional-info visually-hidden" data-address-civic-number-warning>
                              <svg class="icon-svg icon-svg--size-16 field__message__icon" aria-hidden="true" focusable="false">
                                <use xlink:href="#info" />
                              </svg>
                              Add a house number if you have one
                            </p>
                          </div>
                        </div>
                        <div data-address-field="address2" data-autocomplete-field-container="true" class="field field--optional">
                          <label class="field__label" for="checkout_shipping_address_address2"><?php echo $lang
                                                                                                  ->words['checkout']['Apartment, suite, etc. (optional)']; ?></label>
                          <div class="field__input-wrapper">
                            <input placeholder="<?php echo $lang->words['checkout']['Apartment, suite, etc. (optional)']; ?>" autocomplete="shipping address-line2" autocorrect="off" data-backup="address2" class="field__input" size="30" type="text" id="ApartmentAndSuite" />
                          </div>
                        </div>
                        <style>
                          .field-td {
                            width: 50%;
                          }
                        </style>
                        <div class="field-td field field--required">
                          <label class="field__label" for="checkout_shipping_address_zip"><?php echo $lang
                                                                                            ->words['checkout']['Postal code']; ?></label>
                          <div class="field__input-wrapper">
                            <input placeholder="<?php echo $lang->words['checkout']['Postal code']; ?>" autocorrect="off" class="field__input field__input--zip" aria-required="true" size="30" type="text" id="PostalCode" />
                          </div>
                        </div>
                        <div class="field-td field field--required">
                          <label class="field__label" for="checkout_shipping_address_zip"><?php echo $lang
                                                                                            ->words['checkout']['city']; ?></label>
                          <div class="field__input-wrapper">
                            <input placeholder="<?php echo $lang->words['checkout']['city']; ?>" autocomplete="shipping postal-code" autocorrect="off" class="field__input field__input--zip" aria-required="true" size="30" type="text" id="city" />
                          </div>
                        </div>
                      </div>


                      <div class="field">
                        <div class="checkbox-wrapper">
                          <div class="checkbox__input">
                            <input autocomplete="off" size="30" type="hidden" name="checkout[remember_me]" />
                            <input name="checkout[remember_me]" type="hidden" value="0" autocomplete="off" /><input class="input-checkbox" data-backup="remember_me" type="checkbox" value="1" name="checkout[remember_me]" id="RememberMeData" />
                          </div>
                          <label class="checkbox__label" for="checkout_remember_me">
                            <?php echo $lang->words['checkout']['Save this information for next time']; ?>
                          </label>
                        </div>
                      </div>

                    </div>


                  </div>
                </div>







              </div>

              <div class="step__footer" data-step-footer>

                <button id="PlaceDelivery" class="step__footer__continue-btn btn"><span class="btn__content" data-continue-button-content="true"><?php echo $lang
                                                                                                                                                    ->words['checkout']['Continue to shipping']; ?></span><svg class="icon-svg icon-svg--size-18 btn__spinner icon-svg--spinner-button" aria-hidden="true" focusable="false">
                    <use xlink:href="#spinner-button" />
                  </svg></button>
                <a class="step__footer__previous-link" href="//cart"><svg focusable="false" aria-hidden="true" class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                    <path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4" />
                  </svg><span class="step__footer__previous-link-content"><?php echo $lang
                                                                            ->words['checkout']['Return to cart']; ?></span></a>
              </div>

            </form>
          </div>

        </main>
        <footer class="main__footer" role="contentinfo">
          <p>Copyright © <strong>monchercosmetics</strong> All Right Reserved.</p>


        </footer>
      </div>
      <aside class="sidebar" role="complementary">
        <div class="sidebar__header">

          <a class="logo logo--left" href="//"></a>

          <h1 class="visually-hidden">
            Information
          </h1>


        </div>
        <div class="sidebar__content">
          <div id="order-summary" class="order-summary order-summary--is-collapsed" data-order-summary>
            <h2 class="visually-hidden-if-js">Order summary</h2>

            <div class="order-summary__sections">
              <?php foreach ($cart->data as $data) { ?>
                <div class="order-summary__section order-summary__section--product-list">
                  <div class="order-summary__section__content">
                    <table class="product-table">
                      <caption class="visually-hidden">Shopping cart</caption>


                      <thead class="product-table__header">
                        <tr>
                          <th scope="col"><span class="visually-hidden">Product image</span></th>
                          <th scope="col"><span class="visually-hidden">Description</span></th>
                          <th scope="col"><span class="visually-hidden">Quantity</span></th>
                          <th scope="col"><span class="visually-hidden">Price</span></th>
                        </tr>
                      </thead>
                      <tbody data-order-summary-section="line-items">
                        <tr class="product" data-product-id="6567240958012" data-variant-id="39329676427324" data-product-type="Type 8" data-customer-ready-visible>
                          <td class="product__image">
                            <div class="product-thumbnail ">
                              <div class="product-thumbnail__wrapper">
                                <?Php $image = explode(',', $data['image_id']); ?><img src="../GetImage.php?ImageId=<?php echo $image[0]; ?>">
                              </div>
                            </div>

                          </td>
                          <th class="product__description" scope="row">
                            <span class="product__description__name order-summary__emphasis"><?php echo $data['Product Name']; ?></span>
                          </th>
                          <td class="product__quantity">
                            <span class="visually-hidden">
                              1
                            </span>
                          </td>
                          <td class="product__price">

                            <span class="order-summary__emphasis skeleton-while-loading"><?php echo $curr->GetConvertPrice(
                                                                                            $data['Product Price'] - ($data['Product Price'] * ($data['Discount'] / 100))
                                                                                          ); ?></span>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="order-summary__scroll-indicator" aria-hidden="true" tabindex="-1" id="order-summary__scroll-indicator">
                      Scroll for more items
                      <svg aria-hidden="true" focusable="false" class="icon-svg icon-svg--size-12">
                        <use xlink:href="#down-arrow" />
                      </svg>
                    </div>
                  </div>
                </div>
              <?php } ?>


              <div class="order-summary__section order-summary__section--total-lines" data-order-summary-section="payment-lines">
                <table class="total-line-table">
                  <caption class="visually-hidden">Cost summary</caption>
                  <thead>
                    <tr>
                      <th scope="col"><span class="visually-hidden">Description</span></th>
                      <th scope="col"><span class="visually-hidden">Price</span></th>
                    </tr>
                  </thead>
                  <tbody class="total-line-table__tbody">
                    <tr class="total-line total-line--subtotal">
                      <th class="total-line__name" scope="row">Subtotal</th>
                      <td class="total-line__price">
                        <span class="order-summary__emphasis skeleton-while-loading" data-checkout-subtotal-price-target="3900">
                          <?php echo $curr->GetConvertPrice($SubTotal); ?>
                        </span>
                      </td>
                    </tr>

                    <tr class="total-line total-line--taxes" data-checkout-taxes>
                      <th class="total-line__name" scope="row">
                        Taxes (estimated)
                      </th>
                      <td class="total-line__price">
                        <span class="order-summary__emphasis skeleton-while-loading"><?php echo $curr->GetConvertPrice($DeliveryCost); ?></span>
                      </td>
                    </tr>




                  </tbody>
                  <tfoot class="total-line-table__footer">
                    <tr class="total-line">
                      <th class="total-line__name payment-due-label" scope="row">
                        <span class="payment-due-label__total">Total</span>
                      </th>
                      <td class="total-line__price payment-due" data-presentment-currency="USD">
                        <span class="payment-due__price skeleton-while-loading--lg" data-checkout-payment-due-target="3900">
                          <?php echo $curr->GetConvertPrice($total); ?>
                        </span>
                      </td>
                    </tr>

                  </tfoot>
                </table>

              </div>
            </div>
          </div>

          <div class="visually-hidden" data-order-summary-section="accessibility-live-region">
            <div aria-live="polite" aria-atomic="true" role="status">
              Updated total price:
              <span data-checkout-payment-due-target="3900">
                $39.00
              </span>
            </div>
          </div>


          <div id="partial-icon-symbols" class="icon-symbols" data-tg-refresh="partial-icon-symbols" data-tg-refresh-always="true"><svg xmlns="http://www.w3.org/2000/svg">
              <symbol id="info"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M12 11h1v7h-2v-5c-.552 0-1-.448-1-1s.448-1 1-1h1zm0 13C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12zm0-2c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zM10.5 7.5c0-.828.666-1.5 1.5-1.5.828 0 1.5.666 1.5 1.5 0 .828-.666 1.5-1.5 1.5-.828 0-1.5-.666-1.5-1.5z" />
                </svg></symbol>
              <symbol id="caret-down"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                  <path d="M0 3h10L5 8" fill-rule="nonzero" />
                </svg></symbol>
              <symbol id="spinner-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M20 10c0 5.523-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0v2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8h2z" />
                </svg></symbol>
              <symbol id="chevron-right"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                  <path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4" />
                </svg></symbol>
              <symbol id="down-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                  <path d="M10.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L5.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848" />
                </svg></symbol>
            </svg></div>


        </div>
      </aside>
    </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/checkout.js"></script>

</body>

</html>