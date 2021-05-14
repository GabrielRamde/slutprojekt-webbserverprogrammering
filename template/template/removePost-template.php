<?php
	session_start();
	require "../includes/connect.php";
	$sql = "DELETE FROM inlagg WHERE (inlaggID = ?)";
	$ID = $_GET["id"];
	$res = $dbh -> prepare($sql);
	$res->bind_param("i",$ID);
	$res->execute();
	header("Location:index.php");
?>