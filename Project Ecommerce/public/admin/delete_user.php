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
                
            </div>
            <div class="col-lg-9">
                
                </div>

<!----DELETE SECTION BEGINS-->
<div class="main">
<div class="content">
	<h2>Delete user #<?=$user['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>The user #<?=$user['id']?> will be deleted permanently.</p>
    <div class="yesno">
        <a href="delete_user.php?id=<?=$user['id']?>&confirm=yes"><button type="button" class="btn btn-success">Yes</button></a>
        <a href="create_user.php?id=<?=$user['id']?>&confirm=no"><button type="button" class="btn btn-danger">No</button></a>
    </div>
    <?php endif; ?>
    
<a href ="create_user.php">Go Back</a>
</div>
</div>


<!---DELETE SECTION ENDS--->

<!----HERO SECTION ENDS--->

<!-- Footer -->

<?php include('layout/footer.php'); ?>


