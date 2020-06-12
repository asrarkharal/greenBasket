<?php include('../../src/config.php');
include('layout/header.php');
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

    if (empty($result)) {
        $errorUl = "Product Updated !";
    }
}
?>

<div class="main">
    <section class="hero">
        <div class="container">
            <div class="content">
                <div class="contact-form spad">
                    <div class="col-lg-9">
                        <div class="contact__form__title">
                            <h2>Edit Product Page</h2>
                        </div>
                    </div>


                    <h5><?= $errorUl ?></h5>

                    <div class="col-sm-12 col-md-12 col-lg-9">
                        <form method="POST" action="#" id="edit-form-inputs">
                            <fieldset>
                                <legend>Update Product</legend>

                                <p>
                                    <label for="input1">Title:</label> <br>
                                    <input type="text" class="text" name="productTitle" value="<?= $title ?>">
                                </p>
                                <p>
                                    <label for="input1">Description:</label> <br>
                                    <input type="text" class="text" name="productDescription"
                                        value="<?= $description ?>">
                                </p>
                                <p>
                                    <label for="input1">Price:</label> <br>
                                    <input type="text" class="text" name="productPrice" value="<?= $price ?>">
                                </p>
                                <p>
                                    <label for="input1">Img Url:</label> <br>
                                    <input type="text" class="text" name="imgUrl" value="<?= $imgurl ?>">
                                    <input type="hidden" class="text" name="productId" value="<?= $id ?>">
                                </p>
                                <p>
                                    <input type="submit" name="updateProductBtn" value="Update Product"
                                        class="btn btn-success">
                                </p>
                            </fieldset>
                        </form>
                        <a href="index.php">Back To Product Edit Page</a>
                    </div>

                </div>
            </div>

            <section id="myfooter">
                <!-- Footer -->
                <?php include('layout/footer.php'); ?>
            </section>

        </div>
    </section>
</div>


<a href="index.php">Go back</a>