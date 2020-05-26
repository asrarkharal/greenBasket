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


<h3 style="color : green">Show all products</h3>

<?php
$id = $_POST['productHiddenID'];
$prods = $productDbHandler->getOneProduct($id);

?>
<?php foreach ($prods as $val) { ?>

<?php
    ?>

<div class="one-product" style="background-color : #F4FEFE; border-top : dotted">
    <p><b>ID</b> : <?= $val['id'] ?></p>
    <p><b>Title</b>:<?= $val['title'] ?></p>
    <p><b>Description</b> : <?= $val['description'] ?></p>
    <p><b>Price</b> : <?= $val['price'] ?></p>
    <p><b>Img URL</b> : <?= $val['img_url'] ?></p>

</div>

<!-- BootStrap test product starts here-->

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img"
                    src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png"
                    alt="Vans">
                <div class="card-img-overlay d-flex justify-content-end">
                    <a href="#" class="card-link text-danger like">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Vans Sk8-Hi MTE Shoes</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                    <p class="card-text">
                        The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the
                        elements whilst still looking cool. </p>
                    <div class="options d-flex flex-fill">
                        <select class="custom-select mr-1">
                            <option selected>Color</option>
                            <option value="1">Green</option>
                            <option value="2">Blue</option>
                            <option value="3">Red</option>
                        </select>
                        <select class="custom-select ml-1">
                            <option selected>Size</option>
                            <option value="1">41</option>
                            <option value="2">42</option>
                            <option value="3">43</option>
                        </select>
                    </div>
                    <div class="buy d-flex justify-content-between align-items-center">
                        <div class="price text-success">
                            <h5 class="mt-4">$125</h5>
                        </div>
                        <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img"
                    src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png"
                    alt="Vans">
                <div class="card-img-overlay d-flex justify-content-end">
                    <a href="#" class="card-link text-danger like">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Vans Sk8-Hi MTE Shoes</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                    <p class="card-text">
                        The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the
                        elements whilst still looking cool. </p>
                    <div class="options d-flex flex-fill">
                        <select class="custom-select mr-1">
                            <option selected>Color</option>
                            <option value="1">Green</option>
                            <option value="2">Blue</option>
                            <option value="3">Red</option>
                        </select>
                        <select class="custom-select ml-1">
                            <option selected>Size</option>
                            <option value="1">41</option>
                            <option value="2">42</option>
                            <option value="3">43</option>
                        </select>
                    </div>
                    <div class="buy d-flex justify-content-between align-items-center">
                        <div class="price text-success">
                            <h5 class="mt-4">$125</h5>
                        </div>
                        <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- -->
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card">
                <img class="card-img"
                    src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png"
                    alt="Vans">
                <div class="card-img-overlay d-flex justify-content-end">
                    <a href="#" class="card-link text-danger like">
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Vans Sk8-Hi MTE Shoes</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                    <p class="card-text">
                        The Vans All-Weather MTE Collection features footwear and apparel designed to withstand the
                        elements whilst still looking cool. </p>
                    <div class="options d-flex flex-fill">
                        <select class="custom-select mr-1">
                            <option selected>Color</option>
                            <option value="1">Green</option>
                            <option value="2">Blue</option>
                            <option value="3">Red</option>
                        </select>
                        <select class="custom-select ml-1">
                            <option selected>Size</option>
                            <option value="1">41</option>
                            <option value="2">42</option>
                            <option value="3">43</option>
                        </select>
                    </div>
                    <div class="buy d-flex justify-content-between align-items-center">
                        <div class="price text-success">
                            <h5 class="mt-4">$125</h5>
                        </div>
                        <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- 1-->

<!-- BootStrap Test product ends here-->

<?php } ?>
<a href="product_list_page.php">Go Back to All Products</a>
<hr>

<?php
include('layout/footer.php');

?>