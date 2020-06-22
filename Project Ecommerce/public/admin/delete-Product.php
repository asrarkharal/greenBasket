<?php
include('../../src/config.php');
$errorUl = '';

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// exit;

// Delete puns
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

// Fetch puns to display on page

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