<?php
    require('../../src/config.php');

 $msg = "";
 if (isset($_GET['mustLogin'])) {
     $msg = '<div class="alert alert-danger">Obs! The page is protected. Please log in.</div>';
 }

if (isset($_GET['deletedAccount'])) {
    $msg = '<div class="alert alert-warning">Your account has been deleted.</div>';
}
 if (isset($_GET['logout'])) {
     $msg = '<div class="alert alert-warning">You have logged out.</div>';
 }

 if (isset($_POST['doLogin'])) {
     $email           = $_POST['email'];
     $password = $_POST['password'];
    // $user = fetchUserByEmail($email);
     $user = $userDbHandler->fetchUserByEmail($email);

     if ($user && password_verify($password,$user['password'])){
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['id'] = $user['id'];
      redirect("admin_index.php?id={$user['id']}");
 
    }   
      else {
         $msg = '<div class="alert alert-warning">Wrong username or password. Please try again.</div>';
     }
 } 
 include('layout/login_header.php');             
?>

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                
                </div>
                
                </div>
            </div>
        </div>
    </section>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


   


<!-- Main Content -->
<div class="main">
<div class="container">
 <div class="col-lg-12 col-md-12 mx-auto">   
  <div class="auth-box ">
 	<div class="content">
      <form method="POST" action="#">
        
                             
             <?=$msg?> 
            <h3 style="color:green;">Admin Login</h3>
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
                

          
     </form>     
     </div>   
     </div>
     <hr>
 </div>

</div>
</div>
 
<!-- Footer -->
<?php include('layout/footer.php');?>