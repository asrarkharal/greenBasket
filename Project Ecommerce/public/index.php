<?php
include('../src/config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shop</title>
</head>

<body>
    <header>
        <nav>
            <a href="">User Login</a> <span> | </span> <a href="">Register</a>

        </nav>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="user/index.php">User Index</a></li>
                <li><a href="admin/index.php">admin Index</a></li>

            </ul>

        </nav>
    </header>
    <h1>Shop page</h1>

    <?php
    $userDbHandler->getAllUsers();
    ?>


</body>

</html>