<?php
// session_start();
//include('../../src/config.php');
require('../src/config.php');

include('layout/header.php');
?>

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">

                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col" style="width : 10%">Product</th>
                                <th scope="col" style="width : 50%">Information</th>
                                <th scope="col" style="width : 10%"></th>
                                <th scope="col" style="width : 10%">Quantity</th>
                                <th scope="col" style="width : 15%">Price / Product</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($_SESSION['cartItems'] as $cartId => $cartItem) { ?>
                            <tr>

                                <td class="text-center align-middle">
                                    <img src="img/cart/cart-1.jpg" alt="">
                                    <!-- <img id="cartImg" src="cart" alt="" width='100'> -->
                                </td>
                                <td><?= $cartItem['description'] ?></td>
                                <td class="text-center align-middle">
                                    <form action="delete-cart-item.php" method="POST">
                                        <input type="hidden" name="cartId" value="<?= $cartId ?>">
                                        <button type="submit" class="btn">
                                            <svg class="bi bi-trash" width="2em" height="2em" viewBox="0 0 16 16"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                                <td class="align-middle text-center">
                                    <form class="update-cart-form" action="update-cart-form.php" method="POST">
                                        <input type="hidden" name="cartId" value="<?= $cartId ?>">
                                        <input type="number" name="quantity" value="<?= $cartItem['quantity'] ?>" min=0>
                                    </form>
                                </td>
                                <td class="text-center align-middle"><?= $cartItem['price'] ?> kr</td>
                            </tr>
                            <?php } ?>

                        </tbody>

                    </table>
                    <!--  -->
                </div>
            </div>
        </div>
        <di v class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Total Excl.Mom <span>kr <?= $cartTotalSumExcMom ?> </span></li>
                        <li>Total <span>kr <?= $cartTotalSum ?></span></li>
                    </ul>
                    <a href="checkout2.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </di>
    </div>
</section>

<?php include('layout/footer.php') ?>