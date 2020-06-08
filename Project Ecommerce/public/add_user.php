<?php
    require('../src/config.php');

 
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
if(isset($_POST['registerBtn'])){
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
    if(!is_numeric($postal_code)){
        $error .= "<li>The postal code is allow only number</li>";
    }
    if(empty($phone)){
        $error .= "<li>Your phone number is required</li>";
    }
    if(!is_numeric($phone)){
        $error .= "<li>The phone field is allow only number</li>";
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
    if($userDbHandler->fetchUserByEmail($email)){
        $error .= "<li>This E-mail've already registered</li>";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error .= "<li>Not valid e-mail </li>";
    }
    if($error){
        $msg .= "<ul class='alert alert-warning'>{$error}</ul>";
    }
    if(empty($error )) {
         $userData = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'street'    => $street,
            'postal_code'    => $postal_code,
            'city'    => $city,
            'country'    => $country,
            'phone'    => $phone,
            'email'    => $email,
            'password' => $password,
         ];
       $result  = $userDbHandler->addUser($userData);

 
        
        if ($result) {
            $msg = '<div class="alert alert-success">Your registration is success</div>';
        } else {
            $msg = '<div class="error_msg">Register not success. Please try again later! </div>';
        }
    }

}; 

//output with JSON
$data = [
    'message'  => $msg 
 ];
echo json_encode($data);
  //debug($data);

?>