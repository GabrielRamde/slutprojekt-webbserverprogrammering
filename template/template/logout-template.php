<?php
	session_start();
	$_SESSION['anvandarnamn'] = "";
	$_SESSION['status'] = "";
	session_destroy();
	header('Location: login.php'); 
?>