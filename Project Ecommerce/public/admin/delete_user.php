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




