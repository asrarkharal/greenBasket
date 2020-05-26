<?php

require ('../../src/dbconnect.php');

?>
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
        $error .= '<li">Name is required</div>';
        
    }
    if (empty($last_name)) {
        $error .= '<li">Last Name is required</li>';
        
    }
    if (empty($email)) {
        $error .= '<li">Email is required</li>';
        
    }
    if (empty($password)) {
        $error .= '<li">Password is required</li>';
        
    }
    if (empty($phone)) {
        $error .= '<li">Phone number is required</li>';
        
    }
    if (empty($street)) {
        $error .= '<li">Street is required</li>';
        
    }
    if (empty($postal_code)) {
        $error .= '<li">Postal Code is required</li>';
        
    }
    if (empty($city)) {
        $error .= '<li">City is required</li>';
        
    }
    if (empty($country)) {
        $error .= '<li">Country is required</li>';
        
    }
    if ($error) {
        $msg = "<ul class='error'>{$error}</ul>";
    } 
    
    if (empty($error)) {
        try{
            $query = " 
            INSERT INTO users (first_name,last_name,email,password,phone,street,postal_code,city,country)
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
     
    $msg = '<div class="alert alert-success">Your user is created</div>';
    } else {
        
        $msg = '<div class="error_msg">Creating your user failed!</div>';
    }
}
    }
?>

<form method="POST" action="#">
                <fieldset>
                    <legend>Create new User</legend>
                
                   
                    
                    <p>
                        <label for="input1">Name:</label> <br>
                        <input type="text" class="text" name="first_name" value="<?=$first_name?>">
                    </p>
                    
                    <p>
                        <label for="input1">Surname:</label> <br>
                        <input type="text" class="text" name="last_name" value="<?=$last_name?>">
                    </p>

                    <p>
                        <label for="input1">E-mail:</label> <br>
                        <input type="text" class="text" name="email" value="<?=$email?>">
                    </p>

                    <p>
                        <label for="input2">Password:</label> <br>
                        <input type="text" class="text" name="password" value ="<?=$password?>">
                    </p>

                    <p>
                        <label for="input2">Phone:</label> <br>
                        <input type="text" class="text" name="phone" value ="<?=$phone?>">
                    </p>

                    <p>
                        <label for="input1">Street:</label> <br>
                        <input type="text" class="text" name="street" value="<?=$street?>">
                    </p>

                    <p>
                        <label for="input1">Postal Code:</label> <br>
                        <input type="text" class="text" name="postal_code" value ="<?=$street?>">
                    </p>

                    <p>
                        <label for="input1">City:</label> <br>
                        <input type="text" class="text" name="city" value="<?=$city?>">
                    </p>

                    <p>
                        <label for="input1">Country:</label> <br>
                        <input type="text" class="text" name="country" value="<?=$country?>">
                    </p>

                    <p>
                        <input type="submit" name="submit" value="Create"> | 
                        <a href="index.php">Go back</a>
                    </p>
                </fieldset>
            </form>
            <?php

            try {
            $query = "
            SELECT * FROM users
            ";
            $stmt = $dbconnect->query($query);
           $users = $stmt->fetchAll();
           } catch (\PDOException $e) {
           throw new \PDOException($e->getMessage(), (int) $e->getCode());
           }

?>
            <br>
            <div id="content">
        <article class="border">
            <h1>Users</h1>
           

            <br>
            
            <table id="users-tbl">
            	<thead>
	            	<tr>
	            		<th>id</th>
	            		<th>Name</th>
                        <th>Surname</th>
	            		<th>E-mail</th>
	            		<th>Password</th>
                        <th>Phone</th>
                        <th>Street</th>
                        <th>Postal code</th>
                        <th>City</th>
                        <th>Country</th>
	            		
	            	</tr>
            	</thead>
            	<tbody>
                <?php foreach ($users as $key => $user) { ?>
            	
            		<tr>
                        <th><?=$user['id']?></th>
	            		<th><?=htmlentities($user['first_name'])?></th>
	            		<th><?=htmlentities($user['last_name'])?></th>
	            		<th><?=htmlentities($user['email'])?></th>
                        <th><?=htmlentities($user['password'])?></th>
                        <th><?=htmlentities($user['phone'])?></th>
                        <th><?=htmlentities($user['street'])?></th>
                        <th><?=htmlentities($user['postal_code'])?></th>
                        <th><?=htmlentities($user['city'])?></th>
                        <th><?=htmlentities($user['country'])?></th>
	            		<th>
	            			<form action="" method="GET" style="float:left;">
	            				<input type="hidden" name="id" value="<?=$user['id']?>">
				            	<input type="submit" value="Update">
				            </form>
	            			<form action="" method="POST" style="float:left;">
	            				<input type="hidden" name="id" value="<?=$user['id']?>">
	            				<input type="submit" name="deleteUserBtn" value="Delete">
	            			</form>
	            		</th>
	            	</tr>

                    <?php } ?>
            	</tbody>
            </table>

            <hr>
        </article>
    </div>

    
   

