<?php
require('../src/config.php');
include('layout/header.php');
?>
<?php
if (isset($_POST['productDetailBtn'])) {
    $sId = $_POST['productHiddenID'];
    $prods = $productDbHandler->getOneProduct($sId);
}
?>

<?php
$id = $_POST['productHiddenID'];
$prods = $productDbHandler->getOneProduct($id);

?>
<?php foreach ($prods as $val) { ?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img" src="img/categories/cat-2.jpg" alt="Vans">
                <div class="card-img-overlay d-flex justify-content-end">
                    <a href="#" class="card-link text-danger like">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?= $val['title'] ?></h4>
                    <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                    <p class="card-text"><?= $val['description'] ?></p>

                    <div class="buy d-flex justify-content-between align-items-center">
                        <div class="price text-success">
                            <h5 class="mt-4">$<?= $val['price'] ?></h5>
                        </div>
                        <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->

    </div>
</div>
<!-- 1-->

<!-- BootStrap Test product ends here-->

<?php } ?>
<div class="row d-flex justify-content-center">
    <a href="product_list_page.php">Go Back to All Products</a>
</div>
<hr>

<?php
include('layout/footer.php');

?>