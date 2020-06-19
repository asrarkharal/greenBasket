<?php
require('../src/config.php');
unset($_SESSION['cartItems']);
require("layout/header.php"); ?>


<div class="container">
    <div class="row">
        <div class="col-6 jumbotron">

            <h3>Congratulations !!</h3>
            <h5>You have successfully placed your order !</h5>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="index.php" role="button">Back to Home</a>
            </p>


        </div>
    </div>
</div>


<?php require("layout/footer.php"); ?>