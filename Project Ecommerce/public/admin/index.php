<?php include('../../src/config.php'); ?>
<?php include('layout/header.php'); ?>

<div class="main">
    <section class="hero">
        <div class="container">
            <div class="content">

                <?php
                $feedback = "";
                ?>

                <div class="container">
                    <div class="row">
                        <div class="contact-form spad">
                            <div class="col-lg-9">
                                <div class="contact__form__title">
                                    <h2>Manage Products</h2>


                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-9">
                                <form id="product-form-inputs" method="POST" action="create-Product.php">
                                    <fieldset>
                                        <legend>Create Product</legend>


                                        <p>
                                            <label for="input1">Title:</label> <br>
                                            <input type="text" class="text" name="productTitle" value="">
                                        </p>
                                        <p>
                                            <label for="input1">Description:</label> <br>
                                            <input type="text" class="text" name="productDescription" value="">
                                        </p>
                                        <p>
                                            <label for="input1">Price:</label> <br>
                                            <input type="text" class="text" name="productPrice" value="">
                                        </p>
                                        <p>
                                            <label for="input1">Img Url:</label> <br>
                                            <input type="text" class="text" name="imgUrl" value="">
                                        </p>
                                        <p>
                                            <input type="submit" id="createProductBtnId" name="createProductBtn"
                                                value="Create Product" class=" btn btn-success success">
                                        </p>
                                    </fieldset>
                                </form>
                            </div>

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

                        <div class="table-responsive">
                            <div class="col-10">
                                <table class="table table-hover table-fixed">
                                    <thead>
                                        <tr class="table-success">

                                            <th class="th-lg" style="width:10%">Title</th>
                                            <th class="th-lg" style="width:15%">Description</th>
                                            <th class="th-lg" style="width:5%">Price</th>
                                            <th class="th-lg" style="width:20%">Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="productTable">
                                        <?php foreach ($prods as $val) { ?>
                                        <tr>

                                            <td><?= $val['title'] ?></td>
                                            <td><?= $val['description'] ?></td>
                                            <td><?= $val['price'] ?></td>
                                            <td>

                                                <div class="row" id="form-div-btn">
                                                    <div class="">


                                                        <form method="POST" action="#" class="mr-3">
                                                            <input type="hidden" name="productHiddenID"
                                                                value="<?= $val['id'] ?>">
                                                            <input type="submit"
                                                                class="delProduct btn btn-danger delete"
                                                                name="deleteProductBtn" value="Delete">

                                                        </form>
                                                    </div>
                                                    <div>
                                                        <form action="edit_product_page.php" method="POST">
                                                            <input type="hidden" name="editProductHiddenID"
                                                                value="<?= $val['id'] ?>">
                                                            <input type="submit" name="editProductBtn" value="Edit"
                                                                class="btn btn-info update">
                                                        </form>
                                                    </div>


                                                </div>

                                            </td>
                                        </tr>
                                        <?php } ?>

                                        <script src="js/productAjaxFunction.js"></script>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
                                        </script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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