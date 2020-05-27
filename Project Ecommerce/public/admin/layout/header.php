<?php
//require('../src/config.php');
if (isset($_SESSION['first_name'])) {
    $first_name = $_SESSION['first_name'];
    $userId =  $_SESSION['id'];
    // exit;
}
//require(SRC_PATH . 'dbconnect.php');    
//debug($userId);
//die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">

    <!-- Bootstrap  CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- custom  CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <title>Green-Basket.online</title>
</head>

<body>
    <!-- Page Preloder 
    <div id="preloder">
        <div class="loader"></div>
    </div>
    -->
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$200.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Swedish</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <!-- <a href="register_user.php"><i class="fa fa-user"></i> Register</a>
                <a href="login_user.php"><i class="fa fa-user"></i> Login</a>
                <span>Hi <?= $first_name ?></span><a href="logout.php"><span>Log out</span></a> -->


                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <?php
                        if (isset($first_name)) {
                            $aboveNav = "<a class='nav-link' href='user/my_profile.php?id=$userId'>My profile</a><a class='nav-link' href='logout.php'>Log out</a>:: Hi $first_name";
                        } else {
                            $aboveNav = "<a class='nav-link' href='register_user.php'>Register</a><a class='nav-link' href='login_user.php'>Log in</a>";
                        }
                        echo $aboveNav;
                        ?>
                    </li>
                </ul>


            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="promotion.php">Promotion</a></li>
                <li><a href="#">Products</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="ProudctAll.php">All products</a></li>
                        <li><a href="shoping-cart.php">Shoping Cart</a></li>
                        <li><a href="checkout.php">Check Out</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> info@green-basket.online</li>
                <li>Free Shipping for all Order over 399 kr</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> info@green-basket.online</li>
                                <li>Free Shipping for all Order over 399 kr</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Swedish</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <?php
                                if (isset($first_name)) {
                                    $aboveNav = "<a class='nav-link' href='user/my_profile.php?id=$userId'>My profile</a>
                                <a class='nav-link' href='logout.php'>Log out</a>:: Hi $first_name     
                             ";
                                } else {
                                    $aboveNav = "<ul><li> <a class='nav-link' href='register_user.php'>REGISTER</a><a class='nav-link' href='login_user.php'>LOG IN</a></li>
                                </ul>";
                                }
                                echo $aboveNav;
                                ?>





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="promotion.php">Promotion</a></li>
                            <li><a href="#">Products</a>

                                <ul class="header__menu__dropdown">
                                    <li><a href="ProudctAll.php">All products</a></li>
                                    <li><a href="shoping-cart.php">Shoping Cart</a></li>
                                    <li><a href="checkout.php">Check Out</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->