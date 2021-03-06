<?php
// checkLogginSessionForUserProfile();
// $first_name = $_SESSION['first_name'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <!-- custom  CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../user/css/main.css" type="text/css">

    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/styleForTest.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Green-Basket.online</title>
</head>

<body>
    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default ">
            <div class="brand">
                <a href="../index.php"><img src="../img/logo.png" width="65%" alt=""></a>
            </div>

            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i
                            class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                    </div>
                </form>

                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System
                                        space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9
                                        unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly
                                        report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly
                                        meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your
                                        request has been approved</a></li>
                                <li><a href="#" class="more">See all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="lnr lnr-question-circle"></i> <span>Help</span> <i
                                    class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Basic Use</a></li>
                                <li><a href="#">Working With Data</a></li>
                                <li><a href="#">Security</a></li>
                                <li><a href="#">Troubleshooting</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/admin2.jpg"
                                    class="img-circle" alt="Avatar"> <span>Admin</span>
                                     <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                <li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="admin_index.php" class=""><i class="lnr lnr-home"></i>
                                <span>Admin-Dashboard</span></a></li>

                        <li>
                            <a href="#subPages" data-toggle="collapse" class="collapsed"><i
                                    class="lnr lnr-file-empty"></i> <span>Customer</span> <i
                                    class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages" class="collapse ">
                                <ul class="nav">
                                    <li><a href="create_user.php" class="">All customer</a></li>

                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-code"></i>
                                <span>Products</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subPages2" class="collapse ">
                                <ul class="nav">
                                    <li><a href="index.php" class="">All products</a></li>

                                </ul>
                            </div>
                        </li>
                        <li><a href="#" class=""><i class="lnr lnr-dice"></i> <span>Customer service</span></a></li>
                        <li><a href="#" class=""><i class="lnr lnr-cog"></i> <span>Setting</span></a></li>
                        <li><a href="#" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
                        <li><a href="../../public/index.php"><i class="lnr lnr-home"></i> <span>Back to Main Page</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->