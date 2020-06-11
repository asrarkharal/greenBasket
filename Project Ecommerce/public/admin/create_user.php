<?php

require ('../../src/dbconnect.php');
require ('../../src/config.php');
include ('layout/header.php');
?>

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
      
            
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
<?=$msg?>           <hr>
                    <h3 style="color:green; text-align:center;">Create new User</h3>
                    <hr>
                    <form >
                    <div class="form-row" style="margin-top:20px; margin-left:50px;">
                    <div class="form-group col-md-6">
                        <label for="input1">Name:</label> <br>
                        <input type="text" class="text" name="first_name" value="<?=$first_name?>">
                    </div>
                        <div class="form-group col-md-6">
                        <label for="input1">Surname:</label> <br>
                        <input type="text" class="text" name="last_name" value="<?=$last_name?>">
                    </div>
                    </div>
                    <div class="form-row" style="margin-left:50px;">
                    <div class="form-group col-md-6">
                        <label for="input1">E-mail:</label> <br>
                        <input type="text" class="text" name="email" value="<?=$email?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input2">Password:</label> <br>
                        <input type="text" class="text" name="password" value ="<?=$password?>">
                    </div>
                    </div>
                    <div class="form-row" style="margin-left:50px;">
                    <div class="form-group col-md-6"> 
                        <label for="input2">Phone:</label> <br>
                        <input type="text" class="text" name="phone" value ="<?=$phone?>">
                    </div>
                    <div class="form-group col-md-6"> 
                        <label for="input1">Street:</label> <br>
                        <input type="text" class="text" name="street" value="<?=$street?>">
                    </div>
                    </div>
                    <div class="form-row" style="margin-left:50px">
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
                    <input class="btn btn-success" type="submit"  name="submit" value="Create" style="margin-left:10%;">| 
                        <a href="admin_index.php">Go back</a>
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
            <div class=table-responsive>
            <table  class="table table-hover table-fixed">
            	<thead>
	            	<tr class= "table-success">
                       
	            		<th class="th-lg">ID</th>
	            		<th class="th-lg">Name</th>
                        <th class="th-lg">Surname</th>
	            		<th class="th-lg">E-mail</th>
	            		<th class="th-lg">Password</th>
                        <th class="th-lg">Phone</th>
                        <th class="th-lg">Street</th>
                        <th class="th-lg">Postal code</th>
                        <th class="th-lg">City</th>
                        <th class="th-lg">Country</th>
                        <th class="th-lg">Action</th>
                        <th class="th-lg"></th>
	            		
	            	</tr>
           	</thead>
               
                <tbody >
                
                <?php 
                foreach ($users as $row) { 
            	
                   echo'<tr class="table_row">';
                   echo'<td>' .$row['id'] .'</td>';
	               echo'<td>' .$row['first_name'] .'</td>';
	               echo'<td>' .$row['last_name'] . '</td>';
	               echo'<td>' .$row['email'] .'</td>';
                   echo'<td>' .$row['password'] .'</td>';
                   echo'<td>' .$row['phone'] .'</td>';
                   echo'<td>' .$row['street'] .'</td>';
                   echo'<td>' .$row['postal_code'] .'</td>';
                   echo'<td>' .$row['city'] .'</td>';
                   echo'<td>' .$row['country'] .'</td>';
                   echo
                        '<td><a class="btn btn-info update" 
                        href="update_user.php?id='.$row['id'].'">Update</a></td>';
                   echo 
                        '<td><a class="btn btn-danger remove"
                         href="delete_user.php?id='.$row['id'].'">Delete</a>';
                   echo'</tr>';
                }
                ?>
              
                </tbody>
                </table>
              
                
 </section>

    </div>

             
<!-- Hero Section End -->

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
        var id = $(this).parents("tr").attr("id");{


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
    };


</script>


</body>

</html>