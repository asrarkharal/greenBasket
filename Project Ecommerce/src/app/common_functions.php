<?php
	// Oan's functions
	function redirect($location) {
	    header("Location: {$location}");
	    exit;
	}

	function checkLogginSessionForUserProfile() {
	    if (!isset($_SESSION['first_name'])) {
			redirect('../login_user.php?mustLogin');
			exit;
	    } 
	}
		
	function debug($var) {
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}
