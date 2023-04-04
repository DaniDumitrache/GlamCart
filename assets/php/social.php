<?php
require_once 'config.php';

class Social extends DataBase
{

    public function GetSocialData()
    {
        $sql = "SELECT * FROM social";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->SocialData = $data;
    }
}
