<?php
    require('../src/config.php');
    // if(!isset($_SESSION['username'])){
    //     header('Location: login.php?mustLogin');
    //     exit;
    // }
     require(SRC_PATH . 'dbconnect.php');
    include('layout/header.php');
?>
<?php

//  echo "<pre>";
//  print_r($_POST);
// echo "</pre>";
// die; 

$first_name      = '';
$last_name       = '';
$city            = '';
$country         = '';
$street          = '';
$postal_code     = '';
$phone           = '';
$email           = '';
$error           = '';
$msg             = '';
if(isset($_POST['register'])){
    $first_name             = trim($_POST['first_name']);
    $last_name              = trim($_POST['last_name']);
    $city                   = trim($_POST['city']);
    $country                = trim($_POST['country']);
    $street                 = trim($_POST['street']);
    $postal_code            = trim($_POST['postal_code']);
    $phone                  = trim($_POST['phone']);
    $email                  = trim($_POST['email']);
    $password               = trim($_POST['password']);
    $confirmPassword        = trim($_POST['confirmPassword']);

    if(empty($first_name)){
        $error .= "<li>First name is required</li>";
    }
    if(empty($last_name)){
        $error .= "<li>Last name is required</li>";
    }
    if(empty($city)){
        $error .= "<li>City is required</li>";
    }
    if(empty($country)){
        $error .= "<li>Country is required</li>";
    }
    if(empty($street)){
        $error .= "<li>Your street address is required</li>";
    }
    if(empty($postal_code)){
        $error .= "<li>Your postal code is required</li>";
    }
    if(empty($phone)){
        $error .= "<li>Your phone number is required</li>";
    }

    if(empty($password)){
        $error .= "<li>Password is required</li>";
    }

    if(!empty($password) && strlen($password)<6){
        $error .= "<li>Password has to be at least 6 characters</li>";
    }
    if($confirmPassword !== $password) {
        $error .= "<li>You have to confirm the same password </li>";
    }
    if(empty($email)){
        $error .= "<li>E-mail is required</li>";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error .= "<li>Not valid e-mail </li>";
    }

    if($error){
        $msg .= "<ul class='alert alert-warning'>{$error}</ul>";
    }

    if(empty($error )) {
        //save in DB method
        try {
            $query = "
            INSERT INTO users (first_name,last_name,street,city,postal_code,country,email,phone,password)
            VALUES (:first_name,:last_name,:street,:city,:postal_code,:country,:email,:phone,:password);
        ";

        $stmt = $dbconnect->prepare($query);
        $stmt->bindValue(':first_name', $first_name );
        $stmt->bindValue(':last_name', $last_name );
        $stmt->bindValue(':street', $street );
        $stmt->bindValue(':city', $city );
        $stmt->bindValue(':postal_code', $postal_code );
        $stmt->bindValue(':country', $country);
        $stmt->bindValue(':phone', $phone );
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
        $result = $stmt->execute(); // returns true/false

        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        if ($result) {
            $msg = '<div class="alert alert-success">Your registration is success</div>';
        } else {
            $msg = '<div class="error_msg">Register not success. Please try again later! </div>';
        }

    }
}; 
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
 
                    <div class="col-lg-8">
                        <div class="contact__form__title">
                            <!-- <h2>Register</h2> 
                            <h4>Please Register to be our customer </h4>-->

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

<!--              
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" placeholder="Your name">
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" placeholder="Your Email">
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <textarea placeholder="Your message"></textarea>
                                            <button type="submit" class="site-btn">Register</button>
                                        </div>
                                    </div>
                                </form> -->
               
                    <!-- Register Form End -->

            </div>
        </div>
    <!-- Register Section End -->

 
    <!-- Footer -->
    <?php include('layout/footer.php');?>