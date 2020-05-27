<?php
require('../src/config.php');
include('layout/header.php');
//----------------
?>

<div class="row justify-content-center">
    <h3 style="color : green">Products List</h3>
</div>
<?php
$prods = $productDbHandler->getAllProducts();
?>
<div class="container">
    <div class="row">

        <div class="d-flex flex-wrap justify-content-around">
            <?php foreach ($prods as $val) { ?>

            <div class="card mr-2 mt-2 mb-2" style="width: 16rem;">
                <img src="img/categories/cat-1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $val['title'] ?></h5>
                    <p class="card-text"><?= $val['description'] ?></p>

                    <form action="product_page.php" method="POST">
                        <input type="hidden" name="productHiddenID" value="<?= $val['id'] ?>">
                        <input type="submit" name="productDetailBtn" value="Details" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
include('layout/footer.php');

?>