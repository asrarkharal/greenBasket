<?php
       require('../src/config.php');
//     require(SRC_PATH . 'dbconnect.php');
    include('layout/header.php');
?>


<!-- Hero Section Begin -->
<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+46 11.222.3333</h5>
                                <span>support 24/7 </span>
                            </div>
                        </div>
                    </div>
                    

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>About Us</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Our backgroud</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

 
    <!--  About section Begin -->
    <section class="contact spad">
        <div class="container">
        <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                             
                        <h2 style="text-align:center; color:#7FAD39;  font-weight: bold;">WHO WE ARE</h2>
                        <h4 style="text-align:center; color:#7FAD39;  font-weight: bold;">WHERE THE REVOLUTION HAPPENS</h4>
                        <p>We like to do things differently and we are pretty stubborn. It was probably the combination that made us do food revolution: save food and sell it cheaply to climate heroes online. We became completely obsessed when we realized that a third of the world's food goes right into the garbage.</p>
                        <div class="row justify-content-center" ><img src='img/wasteFood.jpg'></div>
                        <p><h4 style="text-align:center; color:#7FAD39;  font-weight: bold;">OUR GOAL?</h4></p>

                        <p>That food waste should be equal to zero and feel as unreasonable as pouring tomato crusher into freshly dyed hair.Around the world, lots of food for waste becomes completely unnecessary. Many times we throw away food without even thinking about it. A jar of tomatoes, the last cup in the brewer or pasta with the best before date passed. We want to pay attention to that. Maybe it can make one or more think. We want good, flawless food to be eaten, not thrown away!</p>
                        <p><h4 style="text-align:center; color:#7FAD39;  font-weight: bold;">THREE PROMISES</h4></p>
                                             <div class="row justify-content-center" ><img src='img/logo-green-BasketBig.png'></div>

                        <p>
                            <li>We always strive to be better and more durable on all fronts. We're not there yet, but we're working on it.</li></br>
                        <li>We promise to listen to you. If you have ideas or suggestions on how we can move forward, raise your hand, and we promise to answer.</li></br>
                        <li>Our long-term goal is to eradicate food waste and waste overall. You can dream! Then we sometimes have to sell goods with passed best-before dates. But never goods that are bad or inedible. We promise.</li>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
    <!-- Footer -->
    <?php include('layout/footer.php');?>