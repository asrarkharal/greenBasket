<?php
include('../src/config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Shop</title>
</head>

<body>
    <h1>Shop page</h1>

    <?php
    $userDbHandler->getAllUsers();
    ?>


</body>

</html>