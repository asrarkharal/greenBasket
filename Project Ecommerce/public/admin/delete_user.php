<?php
require ('../../src/dbconnect.php');
require ('../../src/config.php');

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
            
            header('Location: index.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>

<div class="content delete">
	<h2>Delete user #<?=$user['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete user #<?=$user['id']?>?</p>
    <div class="yesno">
        <a href="delete_user.php?id=<?=$user['id']?>&confirm=yes">Yes</a>
        <a href="delete_user.php?id=<?=$user['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<a href ="index.php">Go Back</a>
