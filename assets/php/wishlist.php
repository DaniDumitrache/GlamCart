<?php
require_once 'session.php';
require_once 'config.php';

class wishlist extends DataBase
{

    public function __CheckExistProduct($wishlist_id)
    {
        $sql = "SELECT * FROM products WHERE id = '$wishlist_id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt->fetch(PDO::FETCH_NUM) == true) {
            return true;
        }
    }

    public function GetWishlistProduct($wishlist_list)
    {
        if (!empty($wishlist_list)) {
            $item_list = implode(',', $wishlist_list);

            $sql = "SELECT * FROM products WHERE id IN ($item_list)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->data = $data;
        }
    }

    public function CalculateWishlistTotal($wishlist_list)
    {
        $DeliveryCost = 0;

        $item_list = implode(',', $wishlist_list);
        $sql = "SELECT SUM(`Product Price`) FROM products WHERE id IN ($item_list)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(pdo::FETCH_ASSOC);

        foreach ($data as $Total) {
            foreach ($Total as $data) {
                $CartTotal = $data + $DeliveryCost;
                $CartSubTotal = $data;

                $Product_Price_Result = [
                    'Total' => $CartTotal,
                    'SubTotal' => $CartSubTotal,
                    'Delivery Cost' => $DeliveryCost,
                ];
            }
        }
        return $this->Product_Price_Result = $Product_Price_Result;
    }

    public function Wishlist()
    {
        if (isset($_GET['RvProductWishlist'])) {
            $id = $_GET['RvProductWishlist'];

            if (in_array($id, $_SESSION['wishlist'])) {
                $nId = array_search($id, $_SESSION['wishlist']);
                unset($_SESSION['wishlist'][$nId]);
                echo "<script>location.reload()</script>";
            }
        }

        if (isset($_GET['EmptyCart'])) {
            if (isset($_SESSION['wishlist'])) {
                unset($_SESSION['wishlist']);
                echo "<script>location.reload()</script>";
            }
        }

        if (isset($_GET['AddToWishlist'])) {
            $id = $_GET['AddToWishlist'];
            if (!isset($_SESSION['wishlist'])) {
                $_SESSION['wishlist'] = [];
            }

            if ($this->__CheckExistProduct($id) == true) {
                if (!in_array($id, $_SESSION['wishlist'])) {
                    array_push($_SESSION['wishlist'], $id);
                    echo "<script>location.reload()</script>";
                }
            }
        }
    }
}

$wishlist = new wishlist;
