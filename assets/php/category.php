<?php
require_once 'config.php';

class Category extends DataBase
{
    public function GetCategoryData()
    {
        $sql = 'SELECT * FROM category';
        $stmt = $this->Conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->CategoryData = $data;
    }

    public function GetCategoryDataCondition($condition)
    {
        $sql = "SELECT * FROM category $condition";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->CategoryData = $data;
    }
}
