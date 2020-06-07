<?php
require('../src/config.php');
include('layout/header.php');
?>
<?php
$title = "";
$description = "";
$price = "";
$img = "";
$productId = "";
?>

<?php
if (isset($_GET['productDetailBtn'])) {
    $sId = $_GET['productHiddenID'];
    $prods = $productDbHandler->getOneProduct($sId);

    foreach ($prods as $val) {
        $title = $val['title'];
        $description = $val['description'];
        $price = $val['price'];
        $img = $val['img_url'];
        $productId = $val['id'];
    }
}
?>
<!-- New try for product page -->
<div class="container" id="product_page_container">
    <div class="row">
        <div class="col-md-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img\featured\feature-1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img\cart\cart-1.jpg" class="d-block w-100" alt="...">
                    </div>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-col-md-7">
            <p class="newarrival text-center">Title</p>
            <h2><?= $title ?></h2>
            <p>Product Code - xybzeee</p>
            <p><?= $description ?></p>
            <p class="price_product"><?= $price ?> Kr</p>
            <p><b>Availability - </b>In Stock</p>
            <p><b>Condition - </b>Fresh</p>
            <p><b>Category - </b>Fruits</p>
            <form action="admin/add-cart-item.php" method="POST" id="product_page_form">
                <label for="qt">Quantity</label>
                <input type="hidden" name="productId" value="<?= $productId ?>">
                <input type="number" name="quantity" value="1" min=0>
                <button type="submit" name="addToCart" class="btn btn-default cart-btn">Add to Cart</button>
                <!-- <input type="submit" name="addToCart" value="Add to Cart" class="btn btn-default" id="cart-btn-1"> -->
            </form>



        </div>
    </div>
</div>

<div class="row d-flex justify-content-center">
    <a href="product_list_page.php">Back All Products</a>
</div>
<hr>







<?php
include('layout/footer.php');

?>