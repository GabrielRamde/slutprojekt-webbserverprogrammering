<?php
	session_start();

	require "../includes/connect.php";

	if($_POST["beskrivning"] != null)
	{
		// Lägger till inlägg
		$sql = "INSERT INTO inlagg(anvandarnamn, beskrivning, Typ) VALUE (?,?,?)";
		$res = $dbh -> prepare($sql);
		$res -> bind_param("ssi", $_SESSION['anvandare'], $_POST['beskrivning'], $_POST['Typ']);
		$res -> execute();
		header("Location:audi.php");
	}
	else
	{
		header("Location:inlagg.php");
	}

?>