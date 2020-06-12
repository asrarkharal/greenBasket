<?php
//include('../../src/config.php');
require('../src/config.php');

// session_start();
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if (!empty($_POST['cartId']) && isset($_SESSION['cartItems'][$_POST['cartId']])) {

    unset($_SESSION['cartItems'][$_POST['cartId']]);
}


if (empty($_SESSION['cartItems'])) {
    header('location: index.php');
    exit;
} else {

    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}