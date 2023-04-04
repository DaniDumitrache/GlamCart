<?php
require_once 'assets/php/config.php';

class Image extends DataBase
{

    public function Image($id)
    {

        $sql = "SELECT * FROM `image` WHERE `imageId` = '$id'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) == 0) {
            return $this->ImageData = ['error' => '404'];
        } else {
            $type = $data[0]['imageType'];

            header("Content-Type: $type");

            return $this->ImageData = $data;
        }
    }
}

$img = new Image;

if (isset($_GET['ImageId']) && !empty($_GET['ImageId'])) {
    $id = $_GET['ImageId'];

    $img->Image($id);

    if (!isset($img->ImageData['error'])) {
        echo $img->ImageData[0]['imageData'];
    }else if(isset($img->ImageData['error']) && $img->ImageData['error'] == '404'){
        
    }
}
