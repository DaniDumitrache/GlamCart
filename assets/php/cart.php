<?php
require_once 'session.php';
require_once 'config.php';
require_once 'wishlist.php';

class Cart extends DataBase
{
    public function __CheckExistProduct($Product_id)
    {
        $sql = "SELECT * FROM products WHERE id = '$Product_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_NUM) == true) {
            return true;
        }
    }

    public function __CheckCart()
    {
        $total_item = count($_SESSION['cart']);

        $sql = 'SELECT id FROM products';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = array_merge($stmt->fetchAll(PDO::FETCH_COLUMN));
    }

    public function GetCartProduct($Product_list)
    {
        $item_list = implode(',', $Product_list);

        $sql = "SELECT * FROM products WHERE id IN ($item_list)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->data = $data;
    }

    public function CalculateCartTotal($Product_list)
    {
        $DeliveryCost =  2.65; // 2.65 EURO = 13 RON // Eur Default

        $item_list = implode(',', $Product_list);
        $sql = "SELECT SUM(`Product Price` - `Product Price` * Discount / 100) FROM products WHERE id IN ($item_list)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(pdo::FETCH_ASSOC);

        if (isset($_SESSION['Coupon'])) {
            $Code = $_SESSION['Coupon'];
            $sql = "SELECT Discount FROM coupons WHERE `Code`='$Code'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $dataCoupon = $stmt->fetchAll(pdo::FETCH_ASSOC);

            foreach ($dataCoupon as $dc) {
                foreach ($dc as $cupon) {
                    $cupon = $cupon;
                }
            }
        }

        foreach ($data as $Total) {
            foreach ($Total as $data) {
                if ($data > 40.80) {
                    $DeliveryCost = 0;
                }

                $CartTotal = $data + $DeliveryCost; // Default EUR
                $CartSubTotal = $data; // Default EUR

                if (!empty($cupon)) {
                    $CartTotal = $CartTotal - ($CartTotal * ($cupon / 100));
                    $CartSubTotal = $CartSubTotal -  ($CartSubTotal * ($cupon / 100));
                }

                $Product_Price_Result = [
                    'Total' => $CartTotal,
                    'SubTotal' => $CartSubTotal,
                    'Delivery Cost' => $DeliveryCost,
                ];
            }
        }
        return $this->Product_Price_Result = $Product_Price_Result;
    }

    public function Cart()
    {
        $wishlist = new wishlist;

        $wishlist->wishlist();

        if (isset($_GET['RvProductCart'])) {
            $id = $_GET['RvProductCart'];

            if (in_array($id, $_SESSION['cart'])) {
                $nId = array_search($id, $_SESSION['cart']);
                unset($_SESSION['cart'][$nId]);
                echo "<script>location.reload()</script>";
            }
        }

        if (isset($_GET['EmptyCart'])) {
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']);
                echo "<script>location.reload()</script>";
            }
        }

        if (isset($_GET['AddToCart'])) {
            $id = $_GET['AddToCart'];
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if ($this->__CheckExistProduct($id) == true) {
                if (!in_array($id, $_SESSION['cart'])) {
                    array_push($_SESSION['cart'], $id);
                    echo "<script>location.reload()</script>";
                }
            }
        }
    }
}
