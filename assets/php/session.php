<?php
require_once 'Cupon.php';
$cupon = new cupon;

if (!isset($_SESSION)) {
    session_start();
}

/* Check If page not equal cart.php or checkout.php Destroy Session Cupon
$actualPage = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);

if (strpos($actualPage, "cart.php") !== false or strpos($actualPage, "checkout.php") !== false) {
} else {
    unset($_SESSION['Coupon']);
}
*/

$cupon->CheckCuppon();
