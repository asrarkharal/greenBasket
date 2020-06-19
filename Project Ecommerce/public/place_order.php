<?php
//require('../src/config.php');
require('../src/dbconnect.php');

function placeOrderDataBase($user, $cartTotalSum)
{

    global $dbconnect;
    try {
        $query = "
INSERT INTO orders (user_id,total_price,billing_full_name, billing_street, billing_postal_code, billing_city,
billing_country)
VALUES (:user_id,:total_price,:billing_full_name, :billing_street, :billing_postal_code, :billing_city,
:billing_country);
";


        $stmt = $dbconnect->prepare($query);
        $stmt->bindValue(':user_id', $user['id']);
        $stmt->bindValue(':total_price', $cartTotalSum);
        $stmt->bindValue(':billing_full_name', "{$user["first_name"]} {$user["last_name"]}");

        $stmt->bindValue(':billing_street', $user['street']);
        $stmt->bindValue(':billing_postal_code', $user['postal_code']);
        $stmt->bindValue(':billing_city', $user['city']);
        $stmt->bindValue(':billing_country', $user['country']);

        $result = $stmt->execute(); // returns true/false
        $orderId = $dbconnect->lastInsertId();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }


    //CREATE ORDER ITEMS TABLE

    foreach ($_SESSION['cartItems'] as $key => $cartItem) {


        try {
            $query = "
INSERT INTO order_items (order_id, product_id, quantity, unit_price, product_title)
VALUES (:orderId, :productId, :quantity, :price, :title);
";
            $stmt = $dbconnect->prepare($query);
            $stmt->bindValue(':orderId', $orderId);
            $stmt->bindValue(':productId', $cartItem['id']);
            $stmt->bindValue(':quantity', $cartItem['quantity']);
            $stmt->bindValue(':price', $cartItem['price']);
            $stmt->bindValue(':title', $cartItem['title']);

            $result = $stmt->execute(); // returns true/false
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    header("location: confirm-order-page.php");
    exit;
}