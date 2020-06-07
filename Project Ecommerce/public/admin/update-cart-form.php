<?php
include('../../src/config.php');

// session_start();
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if ($_POST['quantity'] == 0) {
    unset($_SESSION['cartItems'][$_POST['cartId']]);
} else {

    if (!empty($_POST['cartId']) && isset($_SESSION['cartItems'][$_POST['cartId']])) {
        $_SESSION['cartItems'][$_POST['cartId']]['quantity'] = $_POST['quantity'];
    }
}


if (empty($_SESSION['cartItems'])) {
    header('location: ../index.php');
    exit;
} else {

    header('location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}