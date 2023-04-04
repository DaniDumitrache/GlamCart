<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
require_once 'Cupon.php';
require_once 'delivery.php';
require_once 'cart.php';
require_once 'Auth.php';

session_start();

$Auth = new Auth();
$delivery = new Delivery();
$cart = new cart();
$mail = new PHPMailer(true);
$cupon = new cupon;

// Server Settings
$mail->isSMTP();
$mail->Host       = "smtp.gmail.com";
$mail->SMTPAuth   = true;
$mail->Username   = "danidumitrache01@gmail.com";
$mail->Password   = "hahqikvrdemaovfa";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

if (isset($_POST['action']) && $_POST['action'] == 'login') {
    $email = $_POST['CustomerEmail'];
    $password = $_POST['CustomerPassword'];
    if ($Auth->__check_exist_user($email) == true) {
        if ($Auth->login($email, $password) == true) {
            echo 'succ_log';
        } else {
            echo 'err_pass';
        }
    } else {
        echo 'email_not_exist';
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'Register') {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $newsletter = $_POST['newsletter'];

    if ($Auth->__check_exist_user($email) == false) {
        if (
            $Auth->Register(
                $FirstName,
                $LastName,
                $username,
                $email,
                $password,
                $newsletter
            ) == true
        ) {
            $Auth->AddToNewsletter($username, $email);
            echo 'succ_register';
        } else {
            echo 'err_db';
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'RecoverAccount') {
    $email = $_POST['Email'];


    if ($Auth->__check_exist_user($email) == true) {
        $token = uniqid();
        $token = str_shuffle($token);

        $Auth->forgot_pass($email, $token);

        $mail->setFrom($email, 'Mailer');
        $mail->addAddress($email, 'Joe User');

        $mail->isHTML(true);
        $mail->Subject = 'Reset password';
        $mail->Body    = '
            <p>Someone just requested to change your monchercosmetics account`s credentials. If this was you, click on the link below to reset them.</p>
            <a href="localhost/ecommerce/ResetPassword.php?email=' . $Auth->data['email'] . '&token=' .  $Auth->data['token'] . '">Link to reset password</a>
            <p>This link will expire within 10 minutes.</p>
            <p>If you don`t want to reset your password, just ignore this message and nothing will be changed.</p>';

        $mail->send();
    } else {
        echo 'UserNotExist';
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'ResetPassword') {
    if (isset($_POST['Email']) && isset($_POST['Token']) && !empty($_POST['Email']) && !empty($_POST['Token'])) {

        $email = $_POST['Email'];
        $token = $_POST['Token'];

        if ($Auth->__check_exist_user($email) == true) {
            $sql = "SELECT * FROM `Customers` WHERE email = '$email' AND token = '$token' AND token_expire > NOW()";
            $stmt = $Auth->conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $password = $_POST['Password'];

                $NewPass = password_hash($password, PASSWORD_DEFAULT);
                $Auth->Set_New_Pass($email, $NewPass);
            } else {
                echo 'IncorectSession';
            }
        } else {
            echo 'EmailNotFound';
        }
    } else {
        echo 'IncorectSession';
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'AddUserInNewsletter') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $Auth->AddToNewsletter($name, $email);
}

if (isset($_POST['action']) && $_POST['action'] == 'GetDataCupon') {
    $cuppon = $_POST['Cupon'];
    $cupon->GetCuponDataCondition("WHERE Code='$cuppon'");
    if (!empty($cupon->CuponData)) {
        echo json_encode($cupon->CuponData[0]);
    } else {
        echo "DataNotFound";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'SetCupon') {

    // Get Data
    $cupon->GetCuponDataCondition("WHERE `Code` = '{$_POST['Cupon']}'");
    $cpn = json_decode($cupon->CuponData[0]['UsedFrom'], true);


    $ip = $_POST['ip'];

    if (!in_array($ip, $cpn)) {
        if (!isset($_SESSION['Coupon'])) {
            $_SESSION['Coupon'] = $_POST['Cupon'];
            echo "CupponUsedSuccess";
        } else {
            echo 'CouponSet';
        }
    } else {
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'Delivery') {
    $PhoneNumber = $_POST['PhoneNumber'];
    $CountryAndRegion = $_POST['CountryAndRegion'];
    $Adress = $_POST['Adress'];
    $ApartmentAndSuite = $_POST['ApartmentAndSuite'];
    $PostalCode = $_POST['PostalCode'];
    $city = $_POST['city'];

    $cart->CalculateCartTotal($_SESSION['cart']);
    $total = $cart->Product_Price_Result['Total'];
    $SubTotal = $cart->Product_Price_Result['SubTotal'];
    $DeliveryCost = $cart->Product_Price_Result['Delivery Cost'];

    $cart->GetCartProduct($_SESSION['cart']);

    foreach ($cart->data as $data) {
        $DeliveryPrdouct = $data['Product Name'] . ',';
    }

    $delivery->AddDelivery(
        true,
        $_SESSION['AuthToken'],
        $Adress,
        $CountryAndRegion,
        $city,
        $PostalCode,
        $PhoneNumber,
        $DeliveryPrdouct,
        $DeliveryCost,
        $SubTotal,
        $total
    );

    // adds the ips that can no longer use the entered promo code
    if (isset($_SESSION['Coupon'])) {
        $cupon->GetCuponDataCondition("WHERE `Code` = '{$_SESSION['Coupon']}'");
        $UsedCupon = json_decode($cupon->CuponData[0]['UsedFrom'], true);
        array_push($UsedCupon, $_SERVER['REMOTE_ADDR']);
        $UsedCuponEnc = json_encode($UsedCupon);
        $cupon->AddUserUsedCuppon($UsedCuponEnc, $_SESSION['Coupon']);
        unset($_SESSION['Coupon']);
    }
    echo "<script>location.reload()</script>";
}
