<?php
	$dbh = new mysqli("localhost", "dbUser", "qwe123", "bilblogg");
	
	if(!$dbh) {
		echo "Ingen kontakt med databasen";
		exit;
	}
?>