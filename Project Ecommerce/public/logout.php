<?php
	require('../src/config.php');
	session_start();
	$_SESSION = [];
	session_destroy();
	redirect('login_user.php?logout');
	exit;
