<?php
require_once 'session.php';
session_start();

if (isset($_GET['logout'])) {
    if (isset($_SESSION['AuthToken'])) {
        unset($_SESSION['AuthToken']);
    }
}
