<?php
session_start();
require('../src/config.php');
include('place_order.php');


?>

<?php
$zipCode = "";
$city    = "";
$country = "";
$phone   = "";
$email   = "";
$fname   = "";
$lname   = "";
$street  = "";

$msg     = "";
$userId  = "";
$user    = "";
$checkItems = "";
$error   = "";
$errorUL = "";


// Fetch user by ID
if (isset($_SESSION['id'])) {
    $userId     = $_SESSION['id'];
    $user       = $userDbHandler->fetchUserById($userId);


    $zipCode    = $user['postal_code'];
    $city       = $user['city'];
    $country    = $user['country'];
    $street     = $user['street'];
    $phone      = $user['phone'];
    $email      = $user['email'];
    $fname      = $user['first_name'];
    $lname      = $user['last_name'];
}

if (!isset($_SESSION['id']) && isset($_POST['placeOrderBtn'])) {

    $zipCode    = trim($_POST["postal_code"]);
    $city       = trim($_POST["city"]);
    $country    = trim($_POST["country"]);
    $street     = trim($_POST["country"]);
    $phone      = trim($_POST["phone"]);
    $email      = trim($_POST["email"]);
    $fname      = trim($_POST["first_name"]);
    $lname      = trim($_POST["last_name"]);

    if (empty($fname)) {
        $error .= "<li class = 'text-danger'>Please Enter First Name </li>";
    }
    if (empty($lname)) {
        $error .= "<li class = 'text-danger'>Please Enter Last name </li>";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "<li class = 'text-danger'>Please Enter Valid Email. </li>";
    }
    if (empty($zipCode)) {
        $error .= "<li class = 'text-danger'>Please Enter Postal Code </li>";
    }
    if (empty($city)) {
        $error .= "<li class = 'text-danger'>Please Enter City </li>";
    }
    if (empty($country)) {
        $error .= "<li class = 'text-danger'>Please Enter Country </li>";
    }
    if (empty($street)) {
        $error .= "<li class = 'text-danger'>Please Enter Street </li>";
    }
    if (empty($phone)) {
        $error .= "<li class = 'text-danger'>Please Enter Phone Number </li>";
    }


    if (!empty($error)) {
        $errorUL = "<ul class = 'jumbotron'> {$error} </ul>";
    }

    if (empty($errorUL)) {
        //check again if product exist in database during placing order
        foreach ($_SESSION['cartItems'] as $items) {
            $checkItems = $productDbHandler->getOneProduct2($items['id']);
            if (empty($checkItems['title'])) {
                unset($_SESSION['cartItems']);
                header("location: product_out_of_stock.php");
                exit;
            }
        }

        //check if use (email exist)
        $user = $userDbHandler->fetchUserByEmail($_POST['email']);

        if ($user) {
            $userId = $user['id'];
        } else {
            // if use is new then add user in the DB and fetch the last enterd user id
            $result = $userDbHandler->addUser2($_POST);
            if ($result['result']) {
                $user = $userDbHandler->fetchUserById($result['userId']);
            }
        }

        if ($user) {
            placeOrderDataBase($user, $_POST['cartTotalSum']);
        } else {
            $msg = "Sorry Can not place Order, Something get wrong with User Information...";
        }
    } else {

        $msg = $errorUL;
    }
}

?>
<?php
include('layout/header.php');
?>

<section class="checkout spad" id="checkout-spad-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <h5 id="checkoutMessage "><?= $msg ?></h5>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="first_name" placeholder="Your name"
                                        value=" <?= htmlentities($fname) ?> ">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="last_name" value="<?= htmlentities($lname) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" placeholder="email"
                                        value="<?= htmlentities($email) ?>">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" placeholder="telephone"
                                        value="<?= htmlentities($phone) ?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="checkout__input col-lg-6">
                                <p>Address<span>*</span></p>
                                <input type="text" name="street" placeholder="Street Address"
                                    class="checkout__input__add" value="<?= htmlentities($street) ?>">
                            </div>
                            <div class="checkout__input col-lg-6">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city" placeholder="City" value="<?= htmlentities($city) ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="checkout__input col-lg-6">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="country" placeholder="Country"
                                    value="<?= htmlentities($country) ?>">
                            </div>
                            <div class="checkout__input col-lg-6">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postal_code" placeholder="171 xx"
                                    value="<?= htmlentities($zipCode) ?> ">
                            </div>
                        </div>

                        <div class="checkout__input__checkbox" id='ifCreateNewUser'
                            style="display:<?php echo empty($_SESSION['id']) ? 'block' : 'none'; ?>">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" name="crAccCheckBox" id="acc">
                                <span class="checkmark"></span>
                            </label>

                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input col-lg-6">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Confirm PassWord<span>*</span></p>
                                    <input type="password" name="password" placeholder="****">
                                </div>
                            </div>
                        </div>


                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <!-- Your Order Details -->
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>

                                <?php foreach ($_SESSION['cartItems'] as $items) {
                                    $littleTotal = $items['price'] * $items['quantity'];
                                ?>
                                <li><?= $items['quantity'] ?> X <?= $items['title'] ?> <span>kr <?= $littleTotal ?>
                                    </span></li>
                                <?php } ?>

                            </ul>

                            <div class="checkout__order__total">Total <span>kr <?= $cartTotalSum ?></span></div>
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p></div> -->
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <input type="hidden" name="cartTotalSum" value="<?= $cartTotalSum ?>">
                            <button type="submit" name="placeOrderBtn" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

<?php include('layout/footer.php') ?>