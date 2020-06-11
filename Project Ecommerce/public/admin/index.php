<?php include('../../src/config.php'); ?>
<?php include('../user/layout/header.php'); ?>

<?php
$feedback = "";
?>


<div class="container">
    <div class="contact-form spad">
        <div class="col-lg-9">
            <div class="contact__form__title">
                <h2>Admin Page</h2>
                <h4>Manage Products</h4>

            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-9">
            <form method="POST" action="create-Product.php">
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
                        <input type="submit" id="createProductBtnId" name="createProductBtn" value="Create Product">
                    </p>
                </fieldset>
            </form>
        </div>

    </div>
</div>

<!-- Create product ends here....-->
<?php $feedback ?>
<div id="feedBackProduct"></div>

<?php
$prods = $productDbHandler->getAllProducts();
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <h3 style="color : green">List of Products</h3>
    </div>
    <div class="row justify-content-center">

        <div class="col-10">
            <table class="table">
                <thead>
                    <tr>

                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Img url</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="productTable">
                    <?php foreach ($prods as $val) { ?>
                    <tr>

                        <td><?= $val['title'] ?></td>
                        <td><?= $val['description'] ?></td>
                        <td><?= $val['price'] ?></td>
                        <td><?= $val['img_url'] ?></td>
                        <td>
                            <form method="POST" action="#" class="float-left mr-3">
                                <input type="hidden" name="productHiddenID" value="<?= $val['id'] ?>">
                                <input type="submit" class="delProduct" name="deleteProductBtn" value="Delete">

                            </form>

                            <form action="edit_product_page.php" method="POST" class="float-left">
                                <input type="hidden" name="editProductHiddenID" value="<?= $val['id'] ?>">
                                <input type="submit" name="editProductBtn" value="Edit" class="float-right">
                            </form>

                        </td>
                    </tr>
                    <?php } ?>




                    <script src="js/productAjaxFunction.js"></script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                </tbody>
            </table>

        </div>
    </div>
</div>

