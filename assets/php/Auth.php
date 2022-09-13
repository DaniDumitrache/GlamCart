<?php
require_once 'config.php';
class Auth extends DataBase
{
    public function Login($email, $password)
    {
        $sql = "SELECT * FROM Customers WHERE email = '$email'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $UserData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $UserData['password'])) {
            $_SESSION['AuthToken'] = $UserData['username'];
        }

        return password_verify($password, $UserData['password']);
    }

    public function Register(
        $FirstName,
        $LastName,
        $username,
        $email,
        $password,
        $newsletter
    ) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Customers (`First Name`,`Last Name`,`username`,`email`,`password`) VALUE 
        ('$FirstName', '$LastName', '$username', '$email', '$password')";
        $stmt = $this->conn->prepare($sql);

        $_SESSION['AuthToken'] = $username;

        if ($newsletter == 1) {
            $this->AddToNewsletter($username, $email);
        }
        return $stmt->execute();
    }

    public function AddToNewsletter($name, $email)
    {
        $sql2 = "INSERT INTO newsletter (`name`, `email`) VALUE ('$name', '$email')";
        $stmt = $this->conn->prepare($sql2);
        $stmt->execute();
    }

    public function forgot_pass($email, $token)
    {
        $sql = "UPDATE `Customers` SET token = '$token', token_expire = DATE_ADD(NOW(),
         INTERVAL 10 MINUTE) WHERE email = '$email'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $data = [
            'token' => $token,
            'email' => $email
        ];

        return $this->data = $data;
    }

    public function Set_New_Pass($email, $pass)
    {
        $sql = "UPDATE `Customers` SET `password` = '$pass' WHERE email = '$email'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        echo 'success';

        $token = uniqid();
        $token = str_shuffle($token);

        $this->forgot_pass($email, $token);
    }

    public function __check_exist_user($email)
    {
        $sql = "SELECT * FROM Customers WHERE email = '$email'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->rowCount();

        return $data;
    }
}
