<?php
    require('../src/config.php');
    include('layout/header.php'); 

$first_name      = '';
$last_name       = '';
$city            = '';
$country         = '';
$street          = '';
$postal_code     = '';
$phone           = '';
$email           = '';
$error           = '';
$msg           = '';

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
                        <h2>Register</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Register Section Begin -->
        <div class="container">
            <div class="contact-form spad">
                    <!-- Register Form Begin -->

                    <form method="POST" action="add_user.php" name="myForm" id="myForm">
      <fieldset>
                    <legend>Your information</legend>
                    
                    <!-- Visa errormeddelanden -->
                     <div class="" role="alert" id="form-message"><?=$msg?></div>    
        <div class="form-group" >
             <div class="col-lg-10">
                    <p> <h5>Name-Last name</h5></p>
                    <div class="row">
                        <div class="col-lg-6">                 
                        <!-- <label for="input1">First name:</label> <br> -->
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder='First-name'value= "<?=$first_name?>">
                        </div>                   
                        <div class="col-lg-6">  
                        <!-- <label for="input1">Last name:</label> <br> -->
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder='Last name'value= "<?=$last_name?>">
                        </div> 
                    </div>   
                    
                    <p> <h5>Address</h5></p>

                    <div class="row">
                        <div class="col-lg-6"> 
                        <!-- <label for="input1">Street</label> <br> -->
                        <input type="text" class="form-control" name="street" id="street" placeholder='Street address'value= "<?=$street?>">
                        </div>
                        <div class="col-lg-6"> 
                        <!-- <label for="input1">Country:</label> <br> -->
                        <input type="text" class="form-control" name="country" id="country" placeholder='Country'value= "<?=$country?>">  
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-lg-6"> 
                            <!-- <label for="input1">City:</label> <br> -->
                            <input type="text" class="form-control" name="city" id="city" placeholder='City'value= "<?=$city?>">
                            </div>
                            <div class="col-lg-6"> 
                            <!-- <label for="input1">Postal code:</label> <br> -->
                            <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder='Postal code'value= "<?=$postal_code?>">
                            </div>
                    </div>

                    <p><h5> contact info</h5></p>
                        
                    <div class="row">
                        <div class="col-lg-6">  
                        <!-- <label for="input2">E-mail:</label> <br> -->
                        <input type="text" class="form-control" name="email" id="email" placeholder='Your e-mail' value= "<?=$email?>">
                        </div>
                        <div class="col-lg-6">  
                        <!-- <label for="input2">Phone:</label> <br> -->
                        <input type="text" class="form-control" name="phone"  id="phone" placeholder='Telephone number'value= "<?=$phone?>">
                        </div>
                    </div>

                    <p> <h5> password</h5></p>
                    <div class="row">
                        <div class="col-lg-6">  
                        <!-- <label for="input2">Password:</label> <br> -->
                        <input type="password" placeholder='password' class="form-control" name="password" id="password">
                        </div> 
                        <div class="col-lg-6">  
                            <!-- <label for="input2">Confirm Password:</label> <br> -->
                            <input type="password" placeholder='Confirm password' class="form-control" name="confirmPassword" id="confirmPassword">
                        </div>
                    </div>   
                    <div class="row">
                     <p class="center"><input class="btn btn-outline-secondary" type="submit" name="registerBtn" id="registerBtn" value="Register"></p>
                     </div>
                </div>
              </div>

 
               </div>        
                      
            </fieldset>
    </form>       
            <hr>

            </div>
        </div>
    <!-- Register Section End -->


    <!-- Footer -->
    <?php include('layout/footer.php');?>