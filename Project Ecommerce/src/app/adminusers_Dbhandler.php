<?php

class adminuserDbHandlerClass
  {

    //GET ALL USERS    
    public function getAllUsers()
     {
	    global $dbconnect;

	    try {
	        $query = "
	            SELECT * FROM users;
	        ";

	        $stmt = $dbconnect->query($query);
            $usersList = $stmt->fetchAll();
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $usersList;
	}

    //GET ONE USER

    public function getOneUser($id)
     {
         global $dbconnect;

         try {
             $query ="
             SELECT * FROM users
             WHERE id = :id;
             ";

             $oneuser =$dbconnect ->prepare($query);
             $oneuser ->bindValue(':id', $id);
             $stmt = $oneuser->execute();
        }catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $oneuser;
	}

    //DELETE ONE USER
    public function deleteUserById ($id)
   
   {
        global $dbconnect;
        $msg = '';

    if (isset($_GET['id'])) {
    
    $stmt = $dbconnect->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        exit('User doesn\'t exist with that ID!');
    }
    
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            
            $stmt = $dbconnect->prepare('DELETE FROM users WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the user!';
        } else {
            
            echo "<script>window.location.href('create_user.html');</script>";
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
    }

     //CREATE USER

    public function createUser($createUser)
    {   

        global $dbconnect;

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
}

    //UPDATE USER
    public function updateUser($updateUser) {
            global $dbconnect;
            
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



}
  }


?>