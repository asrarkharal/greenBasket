<?php
require ('../../src/dbconnect.php');
include ('layout/header.php');
$msg ='';



if (isset($_GET['id'])) {
    if (!empty($_POST)) {

        $id         = isset($_POST['id']) ? $_POST['id'] :NULL;
        $first_name = isset($_POST['first_name']) ? $_POST['first_name'] :''; 
        $last_name  = isset($_POST['last_name']) ? $_POST['last_name'] :'';
        $email      = isset($_POST['email']) ? $_POST ['email'] : '';
        $password   = isset($_POST['password']) ? $_POST['password'] : '';
        $phone      = isset($_POST['phone']) ? $_POST['phone'] : '';
        $street     = isset($_POST['street']) ? $_POST['street'] : '';
        $postal_code= isset($_POST['postal_code']) ? $_POST['postal_code'] : '';
        $city       = isset($_POST['city']) ? $_POST['city']: '';
        $country    = isset($_POST['country']) ? $_POST['country'] : '';


        $stmt = $dbconnect->prepare('UPDATE users SET id = ?, first_name = ?, last_name = ?, email = ?, password = ?, phone = ?, street = ?, postal_code = ?, city = ?, country = ? WHERE id = ?');
        $stmt->execute([$id, $first_name, $last_name, $email, $password, $phone, $street, $postal_code, $city, $country, $_GET['id']]);
        $msg = '<div class="alert alert-success">Updated Successfully!</div>';
    }
      
        $stmt = $dbconnect->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}


?>
<!-- HERO SECTION BEGINS -->
<section class="hero">
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
<!--HERO SECTION ENDS---->
<!----FORM UPDATE SECTION BEGINS--->
<div class="content">

<?=$msg?> 
	<legend><h2>Update User #<?=$user['id']?></h2></legend>
    <form action="update_user.php?id=<?=$user['id']?>" method="post">
   
    <form>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="id">ID:</label><br>
        <input type="text" name="id" placeholder="1" value="<?=$user['id']?>" id="id">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="first_name">Name:</label><br>
        <input type="text" name="first_name" placeholder="" value="<?=$user['first_name']?>" id="first_name">
    </div>
    <div class="form-group col-md-4">
        <label for="last_name">Surname:</label><br>
        <input type="text" name="last_name" placeholder="" value="<?=$user['last_name']?>" id="last_name">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="email">E-mail:</label><br>
        <input type="text" name="email" placeholder="" value="<?=$user['email']?>" id="email">
    </div>
    
    <div class="form-group col-md-4">
        <label for="password">Password:</label><br>
        <input type="text" name="password" placeholder="" value="<?=$user['password']?>" id="password">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="phone">Phone:</label><br>
        <input type="text" name="phone" placeholder="" value="<?=$user['phone']?>" id="phone">
    </div>
    
    <div class="form-group col-md-4">
        <label for="street">Street:</label><br>
        <input type="text" name="street" placeholder="" value="<?=$user['street']?>" id="street">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="postal_code">Postal Code:</label><br>
        <input type="text" name="postal_code" placeholder="" value="<?=$user['postal_code']?>" id="postal_code">
    </div>
    
    <div class="form-group col-md-4">
        <label for="city">City:</label><br>
        <input type="text" name="city" placeholder="" value="<?=$user['city']?>" id="city">
    </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-4">
        <label for="country">Country:</label><br>
        <input type="text" name="country" placeholder="" value="<?=$user['country']?>" id="country">
    </div>
    </div>
    <p>
    <input class="btn btn-success" type="submit"  name="submit" value="Update">|
    <a href ="create_user.php">Go Back </a> 
    </p>
    
    </form>
    <hr>
   
</div>
<!--UPDATE FORM ENDS-->