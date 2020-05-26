<?php include('../../src/config.php');
$id = "";
$title = "";
$description = "";
$price = "";
$imgurl = "";
?>

<?php

$errorUl = "";
$result = "";
if (isset($_POST['editProductBtn'])) {
    $eid = $_POST['editProductHiddenID'];
    $prods = $productDbHandler->getOneProduct($eid);

    foreach ($prods as $val) {
        $id = $val['id'];
        $title = $val['title'];
        $description = $val['description'];
        $price = $val['price'];
        $imgurl = $val['img_url'];
    }
}
?>

<?php
if (isset($_POST['updateProductBtn'])) {

    $result = $productDbHandler->updateProduct($_POST);

    $errorUl = $result['myul'];
    $id = $result['pId'];
    $title = $result['pTitle'];
    $description = $result['pDescription'];
    $price = $result['pPrice'];
    $imgurl = $result['pImg'];
}
?>

<?= $errorUl ?>

<form action="" method="POST">
    <fieldset>
        Title : <input type="text" name="productTitle" value="<?= $title ?>">
        Description : <input type="text" name="productDescription" value="<?= $description ?>">
        Price : <input type="text" name="productPrice" value="<?= $price ?>">
        Img URL : <input type="text" name="imgUrl" value="<?= $imgurl ?>">
        Id : <input type="text" name="productId" value="<?= $id ?>">
        <input type="submit" name="updateProductBtn" value="Update Product">
    </fieldset>
</form>
<a href="index.php">Go back</a>