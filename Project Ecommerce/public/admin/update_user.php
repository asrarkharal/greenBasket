<?php
require ('../../src/dbconnect.php');
require ('../../src/config.php');

$msg ='';

//echo $_POST;
//echo "<pre>";
//echo print_r($_POST);
//echo "</pre>";

//echo $_GET;
//echo "<pre>";
//echo print_r($_GET);
//echo "</pre>";

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
        $msg = 'Updated Successfully!';
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

<div class="content update">
    <fieldset>
	<legend><h2>Update User #<?=$user['id']?></h2></legend>
    <form action="update_user.php?id=<?=$user['id']?>" method="post">
    <p>
        <label for="id">ID:</label>
        <input type="text" name="id" placeholder="1" value="<?=$user['id']?>" id="id">
    </p>
    <p>
        <label for="first_name">Name:</label>
        <input type="text" name="first_name" placeholder="" value="<?=$user['first_name']?>" id="first_name">
    </p>
    <p>
        <label for="last_name">Surname:</label>
        <input type="text" name="last_name" placeholder="" value="<?=$user['last_name']?>" id="last_name">
    </p>
    <p>
        <label for="email">E-mail:</label>
        <input type="text" name="email" placeholder="" value="<?=$user['email']?>" id="emmail">
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="text" name="password" placeholder="" value="<?=$user['password']?>" id="password">
    </p>
    <p>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" placeholder="" value="<?=$user['phone']?>" id="phone">
    </p>
    <p>
        <label for="street">Street:</label>
        <input type="text" name="street" placeholder="" value="<?=$user['street']?>" id="street">
    </p>
    <p>
        <label for="postal_code">Postal Code:</label>
        <input type="text" name="postal_code" placeholder="" value="<?=$user['postal_code']?>" id="postal_code">
    </p>
    <p>
        <label for="city">City:</label>
        <input type="text" name="city" placeholder="" value="<?=$user['city']?>" id="city">
    </p>
    <p>
        <label for="country">Country:</label>
        <input type="text" name="country" placeholder="" value="<?=$user['country']?>" id="country">
    </p>
        <input type="submit" value="Update">
    </form>
    </fieldset>
    <a href ="index.php">Go Back </a>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>