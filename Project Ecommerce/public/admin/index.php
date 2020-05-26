<?php include('../../src/config.php'); ?>

<?php
$feedback = "";
if (isset($_POST['deleteProductBtn'])) {
    $id = $_POST['productHiddenID'];
    $productDbHandler->deleteOneProduct($id);
}
if (isset($_POST['createProductBtn'])) {
    $feedback = $productDbHandler->createProduct($_POST);
}

?>

<h1>Admin page</h1>
<h3>Products</h3>
<a href="../../public/index.php">Home</a>

<h3 style="color : pink">Create Product</h3>
<h5>FEED BACK: <?= $feedback ?></h5>
<form action="" method="POST">
    <fieldset>
        Title : <input type="text" name="productTitle">
        Description : <input type="text" name="productDescription">
        Price : <input type="text" name="productPrice">
        Img URL : <input type="text" name="imgUrl">
        <input type="submit" name="createProductBtn" value="Create Product">
    </fieldset>
</form>


<h3 style="color : green">Show all products</h3>

<?php
$prods = $productDbHandler->getAllProducts();
foreach ($prods as $val) { ?>
    <div class="one-product" style="background-color : #F4FEFE; border-top : dotted">
        <p><b>ID</b> : <?= $val['id'] ?></p>
        <p><b>Title</b>:<?= $val['title'] ?></p>
        <p><b>Description</b> : <?= $val['description'] ?></p>
        <p><b>Price</b> : <?= $val['price'] ?></p>
        <p><b>Img URL</b> : <?= $val['img_url'] ?></p>

        <form action="" method="POST">
            <input type="hidden" name="productHiddenID" value="<?= $val['id'] ?>">
            <input type="submit" name="deleteProductBtn" value="Delete This Product">
        </form>

        <form action="edit_product_page.php" method="POST">
            <input type="hidden" name="editProductHiddenID" value="<?= $val['id'] ?>">
            <input type="submit" name="editProductBtn" value="Edit">
        </form>

    </div>

<?php } ?>

<hr>

<h2>USERS</h2>
<?php include ('create_user.php.')?>