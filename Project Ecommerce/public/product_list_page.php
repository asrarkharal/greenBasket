<?php
require('../src/config.php');
include('layout/header.php');
//----------------
?>


<h3 style="color : green">Show all products</h3>

<?php
$prods = $productDbHandler->getAllProducts();
?>
<?php foreach ($prods as $val) { ?>
<div class="one-product" style="background-color : #F4FEFE; border-top : dotted">
    <p><b>ID</b> : <?= $val['id'] ?></p>
    <p><b>Title</b>:<?= $val['title'] ?></p>
    <p><b>Description</b> : <?= $val['description'] ?></p>
    <p><b>Price</b> : <?= $val['price'] ?></p>
    <p><b>Img URL</b> : <?= $val['img_url'] ?></p>

    <form action="product_page.php" method="POST">
        <input type="hidden" name="productHiddenID" value="<?= $val['id'] ?>">
        <input type="submit" name="productDetailBtn" value="Details">
    </form>


</div>

<?php } ?>

<hr>






<?php
include('layout/footer.php');

?>