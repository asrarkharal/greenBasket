<?php include('../../src/config.php'); ?>
<?php include('layout/header.php');
?>

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

<a href="../../public/index.php">Home</a>


<div class="container">
    <div class="contact-form spad">
        <div class="col-lg-9">
            <div class="contact__form__title">
                <h2>Admin Page</h2>
                <h4>Manage User and Products</h4>

            </div>
        </div>
        <h5><?= $feedback ?></h5>

        <div class="col-sm-12 col-md-12 col-lg-9">
            <form method="POST" action="#">
                <fieldset>
                    <legend>Create Product</legend>

                    <p>
                        <label for="input1">Title:</label> <br>
                        <input type="text" class="text" name="productTitle" value="">

                        <label for="input1">Description:</label> <br>
                        <input type="text" class="text" name="productDescription" value="">

                        <label for="input1">Price:</label> <br>
                        <input type="text" class="text" name="productPrice" value="">

                        <label for="input1">Img Url:</label> <br>
                        <input type="text" class="text" name="imgUrl" value="">
                    </p>
                    <p>
                        <input type="submit" name="createProductBtn" value="Create Product">
                    </p>
                </fieldset>
            </form>
        </div>

    </div>
</div>

<hr>
<!-- Create product ends here....-->


<h3 style="color : green">Show all products</h3>

<?php
$prods = $productDbHandler->getAllProducts();
?>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Img url</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($prods as $val) { ?>
        <tr>
            <th scope="row"><?= $val['id'] ?></th>
            <td><?= $val['title'] ?></td>
            <td><?= $val['description'] ?></td>
            <td><?= $val['price'] ?></td>
            <td><?= $val['img_url'] ?></td>
            <td>
                <form method="POST" action="#">
                    <input type="hidden" name="productHiddenID" value="<?= $val['id'] ?>">
                    <input type="submit" name="deleteProductBtn" class="float-left mr-1" value="Delete">

                </form>

                <form action="edit_product_page.php" method="POST">
                    <input type="hidden" name="editProductHiddenID" value="<?= $val['id'] ?>">
                    <input type="submit" name="editProductBtn" value="Edit">
                </form>

            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<?php
include('layout/footer.php')
?>