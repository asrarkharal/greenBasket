<?php
    require('../src/config.php');
    require(SRC_PATH . 'dbconnect.php');
?>
<?php
 $msg = "";
 if (isset($_GET['mustLogin'])) {
     $msg = '<div class="alert alert-danger">Obs! The page is protected. Please log in.</div>';
 }
 if (isset($_GET['logout'])) {
     $msg = '<div class="alert alert-warning">You have logged out.</div>';
 }
    

 if (isset($_POST['doLogin'])) {
     $email           = $_POST['email'];
     // $username = $_POST['username'];
     $password = $_POST['password'];

     try {
         $query = "
         SELECT * FROM users
         WHERE email = :email;
     ";

     $stmt = $dbconnect->prepare($query);
     $stmt->bindValue(':email', $email);
     // $stmt->bindValue(':password', $password );
     // $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT));
     $stmt->execute(); // returns true/false
     $user = $stmt->fetch(); // returns the user record if exists, else returns false
     }
     catch(\PDOException $e){
         throw new \PDOException($e->getMessage(), (int) $e->getCode());
     }
    //  debug($_POST);  
    //  debug($user['id']);
    //  debug($_SESSION);
       
     if ($user && password_verify($password,$user['password'])){
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['id'] = $user['id'];
      redirect("user/my_profile.php?id={$user['id']}");
 
    }   
      else {
         $msg = '<div class="alert alert-warning">Wrong username or password. Please try again.</div>';
     }
 } 
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
                                <h5>+46 11.188.888</h5>
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
                        <h2>Log in</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Log in</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


<!-- Main Content -->
<div class="container">
 <div class="col-lg-10 col-md-10 mx-auto">   
  <div class="auth-box ">
 	<div class="content">
      <form method="POST" action="#">
        
             <legend>Log in</legend>                    
             <?=$msg?> 
             
             <p>
                 <label for="input1">E-mail:</label> <br>
                 <input type="text" class="form-control" name="email">
             </p>
             <p>
                 <label for="input2">Password:</label> <br>
                 <input type="password" class="form-control" name="password">
             </p>
             <p>
                 <input type="submit" name="doLogin" value="Login">
             </p>
                    <!-- <div class="form-group clearfix">
						<label class="fancy-checkbox element-left">
							<input type="checkbox">
							<span>Remember me</span>
						</label>
                    </div>
 					<div class="bottom">
						<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
					</div> -->

          
     </form>     
     </div>   
   
     <hr>
 </div>

</div>
 

 


<!-- Footer -->
<?php include('layout/footer.php');?>