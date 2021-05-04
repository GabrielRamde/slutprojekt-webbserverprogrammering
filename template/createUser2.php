<?php
	$mail = filter_input(INPUT_POST,'mail', FILTER_SANITIZE_EMAIL);
	$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	echo $adress;
	echo "<br>";
	echo $password;
?>