<?php
require_once 'config.php';

class Products extends DataBase
{
    public function product($condition)
    {
        if (empty($condition)) {
            $sql = 'SELECT * FROM products';
        } else {
            $sql = "SELECT * FROM products $condition";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(pdo::FETCH_ASSOC);

        return $this->data = $data;
    }

    public function Newproduct($limit)
    {
        if ($limit == 0) {
            $sql = 'SELECT * FROM products';
        } else {
            $sql = "SELECT * FROM products LIMIT $limit";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(pdo::FETCH_ASSOC);

        return $this->data = $data;
    }

    public function GetProductDataQuery($query)
    {
        $sql = "$query";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $this->data = $data;
    }
}
