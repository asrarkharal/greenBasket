<?php
require('../src/config.php');
//     require(SRC_PATH . 'dbconnect.php');
include('layout/header.php');
?>
<hr>

<ul style="margin-left: 30px;">
    <li>
        <a href="admin/index.php">Admin Product</a><br>
    </li>
    <li>
        <a href="admin/create_user.php">Users</a>
    </li>
</ul>
<hr>

<!-- Footer -->
<?php include('layout/footer.php'); ?>