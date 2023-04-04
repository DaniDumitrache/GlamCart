<?php
require_once 'config.php';
class Delivery extends DataBase
{
    public function CalculateDeliveryCost($kg)
    {
        $perKg = 1.27;
        $FirstKg = 0;

        if ($kg >= 1) {
            $FirstKg = 15.37;
        }

        $fkg = $FirstKg * $kg;

        $DeliveryCost = $fkg + $perKg * $kg;
    }

    public function AddDelivery(
        $status,
        $From,
        $Address,
        $CountryAndRegion,
        $city,
        $PostalCode,
        $PhoneNumber,
        $ProductName,
        $DeliveryCost,
        $SubTotal,
        $Total
    ) {
        $sql = "INSERT INTO delivery (`status`,`From`,`Address`,`country/region`,`city`,`Postal Code`,`phone number`,`Product Name`,`Delivery cost`,`Sub Total`,`Total`) VALUE 
     ('$status', '$From','$Address','$CountryAndRegion','$city','$PostalCode','$PhoneNumber','$ProductName','$DeliveryCost','$SubTotal','$Total')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        unset($_SESSION['cart']);
    }
}
