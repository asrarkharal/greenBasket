<?php
require ('../../src/dbconnect.php');
require ('../../src/config.php');
include ('layout/header.php');

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
?>
<!---HERO SECTION BEGINS--->
<section class="hero">
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
                            <h5>+46 11.222.3333</h5>
                            <span>support 24/7 </span>
                        </div>
                    </div>
                </div>

<!----DELETE SECTION BEGINS-->
<div class="content">
	<h2>Delete user #<?=$user['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete user #<?=$user['id']?>?</p>
    <div class="yesno">
        <a href="delete_user.php?id=<?=$user['id']?>&confirm=yes"><button type="button" class="btn btn-success">Yes</button></a>
        <a href="create_user.php?id=<?=$user['id']?>&confirm=no"><button type="button" class="btn btn-danger">No</button></a>
    </div>
    <?php endif; ?>
</div>

<a href ="create_user.php">Go Back</a>

<!---DELETE SECTION ENDS--->

<!----HERO SECTION ENDS--->

<!-- Footer -->

<?php include('layout/footer.php'); ?>

