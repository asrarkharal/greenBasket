<?php
// session_start();
// include("dbconnect.php");
include('../../src/config.php');

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if (!empty($_POST['quantity'])) {

    $productId = (int) $_POST['productId'];
    $quantity = (int) $_POST['quantity'];


    try {
        $qu = "SELECT * FROM products WHERE id = :id; ";
        $stmt = $dbconnect->prepare($qu);
        $stmt->bindValue(':id', $productId);
        $stmt->execute();
        $product = $stmt->fetch();
    } catch (\PDOException $th) {
        throw new \PDOException($th->getMessage(), (int) $th->getCode());
    }

    // echo "<pre>";
    // print_r($product);
    // echo "</pre>";


    if ($product) {
        $product = array_merge($product, ['quantity' => $quantity]);
        $cartItem = [$productId => $product];


        if (empty($_SESSION['cartItems'])) {
            $_SESSION['cartItems'] = $cartItem;
        } else {
            if ($_SESSION['cartItems'][$productId]) {

                $_SESSION['cartItems'][$productId]['quantity'] += $quantity;
            } else {
                $_SESSION['cartItems'] += $cartItem;
            }
        }
    }
}



header('location: ' . $_SERVER['HTTP_REFERER']);
exit;