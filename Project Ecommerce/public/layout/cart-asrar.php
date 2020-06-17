<?php


?>



<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
    <div class="header__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <!-- <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li> -->
            <li>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartModal">
                    <a href="#"><i class="fa fa-shopping-bag"></i>
                        <span><?= $cartItemCount ?> </span></a>
                </button>
            </li>
        </ul>
    </div>



    <!-- Modal Start here.  -->

    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-shopping-bag"></i>
                        Total : <?= $cartTotalSum ?> - Kr
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- modal body starts -->
                    <?php foreach ($_SESSION['cartItems'] as $cartId => $cartItem) { ?>


                    <div class="row">
                        <div class="col-3">
                            <img src="../public/img/cart/cart-1.jpg" alt="" style="width: 40px;"
                                class="align-items-center">
                        </div>
                        <div class="col-3"><?= $cartItem['title'] ?></div>
                        <div class="col-3"><?= $cartItem['quantity'] ?></div>
                        <div class="col-3"><?= $cartItem['price'] ?></div>
                    </div>
                    <hr>

                    <?php } ?>
                    <!-- modal body ends -->



                </div>
                <div class="modal-footer">

                    <form action="../public/checkout.php" method="POST" class="mt-2">
                        <Button type="submit" name="checkOutBtn" value="Checkout"
                            class="btn btn-primary">Checkout</Button>
                    </form>
                    <form action="" method="POST" class="mt-2">
                        <button type="submit" name="emptyCartBtn" value="" class="btn btn-outline-secondary"> Clear Cart
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>