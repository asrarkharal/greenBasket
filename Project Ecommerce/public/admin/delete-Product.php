<?php
include('../../src/config.php');
$errorUl = '';

if (isset($_POST['deleteProBtn'])) {
    try {
        $query = "
      DELETE FROM products
      WHERE id = :id;
    ";

        $stmt = $dbconnect->prepare($query);
        $stmt->bindValue(':id', $_POST['pId']);
        $stmt->execute();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
    if ($stmt) {
        $errorUl = '<div class="p-3 mb-2 bg-warning text-dark"> Product Deleted !</div>';
    }
}

//Display products on page with Json format
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