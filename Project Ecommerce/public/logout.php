<?php
	require('../src/config.php');
	session_start();
	$_SESSION = [];
	session_destroy();
	if(isset($_GET['deletedAccount'])){
		redirect('login_user.php?deletedAccount');
	}else{
			redirect('login_user.php?logout');

	}
	
