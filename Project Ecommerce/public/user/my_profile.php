<?php
    require('../../src/config.php');
    // if(!isset($_SESSION['username'])){
    //     header('Location: login.php?mustLogin');
    //     exit;
    // }
    require(SRC_PATH . 'dbconnect.php');
    include('layout/header.php');
?>
<?php   
    if (isset($_GET['id'])) { 
        $userId= $_GET['id'];
            
      // Fetch user to display on page
      try {
        $query = 
        "SELECT * FROM users 
        WHERE id = :id
        ";

         $stmt = $dbconnect->prepare($query);
         $stmt->bindValue(':id', $userId );

        $stmt = $dbconnect->query($query);
            //  $stmt = $dbconnect->prepare($query);
            //  $stmt->bindValue(':id', $blogId);
        $user = $stmt->fetch();
        $stmt->execute();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
      }
    }  ;
    // echo "<pre>";
    // print_r($user);
    // echo "</pre>";
    //die;
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
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
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
                        <h2>My profile</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>My profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- My profile Section Begin -->
        <div class="container">
            <div class="contact-form spad">
 
                    <div class="col-lg-8">
                        <div class="contact__form__title">
                            <h2>My Profile</h2>
                            <h4>Please have a look if your information is correct!</h4>

                        </div>
                    </div>
 
                    <!-- Register Form Begin -->

                    <form method="POST" action="#">
                <fieldset>
                    <legend>Your information</legend>
                    
                    <!-- Visa errormeddelanden -->
                    <?=$msg?> 
                    
                    <p>
                        <label for="input1">First name:</label> <br>
                        <input type="text" class="text" name="first_name" value= "<?=$first_name?>">
                    
                        <label for="input1">Last name:</label> <br>
                        <input type="text" class="text" name="last_name" value= "<?=$last_name?>">
                    </p>
                    <p> <h4>Address</h4>
                        <label for="input1">Street</label> <br>
                        <input type="text" class="text" name="street" value= "<?=$street?>">
                    
                        <label for="input1">City:</label> <br>
                        <input type="text" class="text" name="city" value= "<?=$city?>">

                        <label for="input1">Postal code:</label> <br>
                        <input type="text" class="text" name="postal_code" value= "<?=$postal_code?>">

                        <label for="input1">Country:</label> <br>
                        <input type="text" class="text" name="country" value= "<?=$country?>">
                    </p>


                    <p><h4>Contact</h4>
                        <label for="input2">E-mail:</label> <br>
                        <input type="text" class="text" name="email" value= "<?=$email?>">

                        <label for="input2">Phone:</label> <br>
                        <input type="text" class="text" name="phone" value= "<?=$phone?>">

                    </p>
                    <p>
                        <label for="input2">Password:</label> <br>
                        <input type="password" class="text" name="password">
                    </p>
                    <p>
                        <label for="input2">Confirm Password:</label> <br>
                        <input type="password" class="text" name="confirmPassword">
                    </p>
                    <p>
                        <input type="submit" name="register" value="Register">
                    </p>
                </fieldset>
            </form>        
            <hr>

 

            </div>
        </div>
    <!-- Register Section End -->

 
    <!-- Footer -->
    <?php include('layout/footer.php');?>