<?php
require ('../../src/dbconnect.php');
include ('layout/header.php');
?>

<!-- HERO SECTION BEGINS -->
<div class="main">
<section class="hero">
    <div class="container">
        <div class="row">
            
            </div>
            
<!--HERO SECTION ENDS---->

<!---UPDATE USERS STARTS---->
<?php
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
<!----UPDATE USERS ENDS---->
<!----FORM UPDATE SECTION BEGINS--->
<div class="content">

<?=$msg?> 
     <h2 style ="color:green;">Update User #<?=$user['id']?></h2>
     <hr>
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
    
    <div class="form-group col-md-2" style="margin-top:85px; margin-left:20px; ">
    <input class="btn btn-success" type="submit"  name="submit" value="Update" >|
    <a href ="create_user.php">Go Back </a> 
    </div>
    </div>
    </form>
    <hr>
   
</div>
</div>
</div>
<!--UPDATE FORM ENDS-->