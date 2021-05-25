<?php
	session_start();

	require "../includes/connect.php";

	if($_POST["beskrivning"] != null)
	{
		// Lägger till inlägg
		$beskrivning = filter_input(INPUT_POST,'beskrivning', FILTER_SANITIZE_STRING);
		
		$sql = "INSERT INTO inlagg(anvandarnamn, beskrivning, Typ) VALUE (?,?,?)";
		$res = $dbh -> prepare($sql);
		$res -> bind_param ("ssi", $_SESSION['anvandare'], $beskrivning, $_POST['Typ']);
		$res -> execute();
		header("Location:audi.php");
	}
	else
	{
		header("Location:inlagg.php");
	}
?>