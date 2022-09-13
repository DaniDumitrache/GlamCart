<?php
require 'config.php';

class cupon extends DataBase
{

    public function GetCuponDataCondition($condition)
    {
        $sql = "SELECT * FROM coupons $condition";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->CuponData = $data;
    }

    public function AddUserUsedCuppon($ip, $CodeCupon)
    {
        $sql = "UPDATE coupons SET UsedFrom = '$ip' WHERE Code='$CodeCupon'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function CheckCuppon()
    {
        if (isset($_SESSION['Coupon'])) {
            $sql = "SELECT * FROM coupons WHERE `Code` = '{$_SESSION['Coupon']}'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $stmt->rowCount();

            if ($stmt->rowCount() == 0) {
                unset($_SESSION['Coupon']);
            }
        }
    }
}
