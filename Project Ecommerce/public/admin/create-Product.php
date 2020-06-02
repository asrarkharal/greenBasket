<?php
include('../../src/config.php');

$errorUl = '';

if (isset($_POST['crProductBtn'])) {


    $errorMessage = '';

    $productTitle = $_POST['crProductTitle'];
    $productDescription = $_POST['crProductDescription'];
    $productPrice = $_POST['crProductPrice'];
    $productImgUrl = $_POST['crProductImgUrl'];

    if (empty($productTitle)) {
        $errorMessage .= '<li> Product Title Can not be Empty.</li>';
    }
    if (empty($productDescription)) {
        $errorMessage .= '<li> Product Description can not be empty</li>';
    }
    if (empty($productPrice)) {
        $errorMessage .= '<li> Product Price Field Can not be Empty.</li>';
    }

    if (!filter_var($productPrice, FILTER_VALIDATE_INT)) {
        $errorMessage .= '<li> Enter Price in Numbers.</li>';
    }

    if (empty($productImgUrl)) {
        $errorMessage .= '<li> Img url Field Can not be Empty.</li>';
    }

    if (!empty($errorMessage)) {
        $errorUl = "<ul id='listOfErrors'>{$errorMessage}</ul>";
    }

    if (empty($errorUl)) {

        try {
            $query = "INSERT INTO products (title, description, price, img_url)
VALUES (:title, :description, :price, :imgurl);
";
            $st = $dbconnect->prepare($query);
            $st->bindValue(':title', $productTitle);
            $st->bindValue(':description', $productDescription);
            $st->bindValue(':price', $productPrice);
            $st->bindValue(':imgurl', $productImgUrl);
            $productSuccess = $st->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        if ($productSuccess) {
            $errorUl = "Product Created";
        }
    }
}

try {
    $query = "
SELECT * FROM products;
";
    $stmt = $dbconnect->query($query);
    $productsListArray = $stmt->fetchAll();
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

$data = [
    'products' => $productsListArray,
    'generalMsg' => $errorUl
];

echo json_encode($data);