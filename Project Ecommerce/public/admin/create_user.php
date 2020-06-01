<?php

require ('../../src/dbconnect.php');
require ('../../src/config.php');
include ('layout/header.php');
?>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            
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
                <div class="content">
                    
                           




<!---INSERT USERS---->
<?php
 //echo "<pre>";
 //print_r($_POST);
 //echo "</pre>";

        $first_name ='';
        $last_name ='';
        $email ='';
        $password ='';
        $phone ='';
        $street ='';
        $postal_code ='';
        $city='';
        $country='';
        $error='';
        $msg ='';


    if(isset($_POST['submit'])){
    $first_name   = trim($_POST['first_name']);
    $last_name    = trim($_POST['last_name']);
    $email        = trim($_POST['email']);
    $password     = trim($_POST['password']);
    $phone        = trim($_POST['phone']);
    $street       = trim($_POST['street']);
    $postal_code  = trim($_POST['postal_code']);
    $city         = trim($_POST['city']);
    $country      = trim($_POST['country']);

    if (empty($first_name)) {
        $error .= '<div class="alert alert-danger">Name is required</div>';
        
    }
    if (empty($last_name)) {
        $error .= '<div class="alert alert-danger">Last Name is required</div>';
        
    }
    if (empty($email)) {
        $error .= '<div class="alert alert-danger">Email is required</div>';
        
    }
    if (empty($password)) {
        $error .= '<div class="alert alert-danger">Password is required</div>';
        
    }
    if (empty($phone)) {
        $error .= '<div class="alert alert-danger">Phone number is required</div>';
        
    }
    if (empty($street)) {
        $error .= '<div class="alert alert-danger">Street is required</div>';
        
    }
    if (empty($postal_code)) {
        $error .= '<div class="alert alert-danger">Postal Code is required</div>';
        
    }
    if (empty($city)) {
        $error .= '<div class="alert alert-danger">City is required</div>';
        
    }
    if (empty($country)) {
        $error .= '<div class="alert alert-danger">Country is required</div>';
        
    }
    if ($error) {
        $msg = "<ul class='error'>{$error}</ul>";
    } 
    
    if (empty($error)) {
        try{
            $query = " INSERT INTO users (first_name,last_name,email,password,phone,street,postal_code,city,country)
            VALUES (:first_name ,:last_name,:email, :password, :phone , :street ,:postal_code, :city, :country);
            ";
    
    $stmt = $dbconnect->prepare($query);
    $stmt->bindValue(':first_name', $first_name);
    $stmt->bindValue(':last_name', $last_name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':phone', $phone);
    $stmt->bindValue(':street', $street);
    $stmt->bindValue(':postal_code', $postal_code);
    $stmt->bindValue(':city', $city);
    $stmt->bindValue(':country', $country);
    $result = $stmt->execute(); 
        }catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }
           


    if ($result){
        $first_name='';
        $last_name='';
        $email= '';
        $password ='';
        $phone ='';
        $street ='';
        $postal_code ='';
        $city ='';
        $country ='';

     
    $msg = '<div class="alert alert-success">Your user is created</div>';
    } else {
        
        $msg = '<div class="error_msg">Creating your user failed!</div>';
    }
}
    }
?>

<!--  FORM USER INSERT---->
<section>
<form method="POST" action="#">
<?=$msg?>          
                    <h4>Create new User</h4>
                    
                    <form>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input1">Name:</label> <br>
                        <input type="text" class="text" name="first_name" value="<?=$first_name?>">
                    </div>
                        <div class="form-group col-md-6">
                        <label for="input1">Surname:</label> <br>
                        <input type="text" class="text" name="last_name" value="<?=$last_name?>">
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="input1">E-mail:</label> <br>
                        <input type="text" class="text" name="email" value="<?=$email?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input2">Password:</label> <br>
                        <input type="text" class="text" name="password" value ="<?=$password?>">
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6"> 
                        <label for="input2">Phone:</label> <br>
                        <input type="text" class="text" name="phone" value ="<?=$phone?>">
                    </div>
                    <div class="form-group col-md-6"> 
                        <label for="input1">Street:</label> <br>
                        <input type="text" class="text" name="street" value="<?=$street?>">
                    </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6"> 
                        <label for="input1">Postal Code:</label> <br>
                        <input type="text" class="text" name="postal_code" value ="<?=$street?>">
                    </div>
                    <div class="form-group col-md-6"> 
                        <label for="input1">City:</label> <br>
                        <input type="text" class="text" name="city" value="<?=$city?>">
                    </div>
                    <div class="form-group col-md-6"> 
                        <label for="input1">Country:</label> <br>
                        <input type="text" class="text" name="country" value="<?=$country?>">
                    </div>
                    </div>
                    <p>
                    <input class="btn btn-success" type="submit"  name="submit" value="Create">| 
                        <a href="../index.php">Go back</a>
                    </p>
                  
              
            </form>
            <hr>

</section>
<!----END FORM--->



<!---DISPLAY USERS---->
            <?php

           $users =$adminuserDbHandler->getAllUsers();
           ?>
            <br>
            
             <section>
            <h3>Users</h3>
             
            <table  class="table table-hover">
            	<thead>
	            	<tr class= "table-success">
                       
	            		<th scope="column">ID</th>
	            		<th scope="column">Name</th>
                        <th scope="column">Surname</th>
	            		<th scope="column">E-mail</th>
	            		<th scope="column">Password</th>
                        <th scope="column">Phone</th>
                        <th scope="column">Street</th>
                        <th scope="column">Postal code</th>
                        <th scope="column">City</th>
                        <th scope="column">Country</th>
	            		
	            	</tr>
                  
            	</thead>
                </table>
               
            	<tbody>
                <?php foreach ($users as $key => $user) { ?>
            	    
                    <table  class="table table-hover">
            	    <thead>
            		<tr>
                        <th scope="column"><?=$user['id']?></th>
	            		<th scope="column"><?=htmlentities($user['first_name'])?></th>
	            		<th scope="column"><?=htmlentities($user['last_name'])?></th>
	            		<th scope="column"><?=htmlentities($user['email'])?></th>
                        <th scope="column"><?=htmlentities($user['password'])?></th>
                        <th scope="column"><?=htmlentities($user['phone'])?></th>
                        <th scope="column"><?=htmlentities($user['street'])?></th>
                        <th scope="column"><?=htmlentities($user['postal_code'])?></th>
                        <th scope="column"><?=htmlentities($user['city'])?></th>
                        <th scope="column"><?=htmlentities($user['country'])?></th>
	            		<th scope="column">
                        <a href="update_user.php?id=<?=$user['id']?>" class="edit"><button type="button" class="btn btn-info update" >Update</button></a></th>
                        <th scope ="column">
                        <a href="delete_user.php?id=<?=$user['id']?>" class="trash"><button type="button" class="btn btn-danger remove">Delete</button></a>
	            		</th>
	            	</tr>
                    </thead>
                </table>

                    <?php } ?>
            	</tbody>
            </table>

        
            </div>
    </section>

    

          
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Footer -->
<?php include('layout/footer.php'); ?>
</body>

<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
  
        {
            $.ajax({
               url: 'delete_user.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               }
              
               
            });
        }
    });


</script>

<script type="text/javascript">
    $(".update").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to update this user ?'));
        else
         return false;
        {
            $.ajax({
               url: 'update_user.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               }
              
               
            });
        }
    });


</script>


</html>