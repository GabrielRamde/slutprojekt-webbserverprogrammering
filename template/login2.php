<?php
	
	if(empty($_POST['anvandarnamn'])||empty($_POST['password'])){
		header("Location:../html/login.php");
	}
	require "../includes/connect.php";
	
	
	$anvandarnamn = filter_input(INPUT_POST,'anvandarnamn', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW);
	
	$sql="SELECT password, status FROM anvandare WHERE anvandarnamn=?";
	$res=$dbh->prepare($sql);
	$res->bind_param("s",$anvandarnamn);
	$res->execute();
	
	$result=$res->get_result();
	$row=$result->fetch_assoc();
	
	if(!$row)
	{
		header("Location:../html/login.php?status=1");
	}
	else
	{
		if(password_verify($password,$row['password']))
		{
			session_start();
			$_SESSION['anvandarnamn']=$anvandarnamn;
			$_SESSION['status']=$row['status'];
			header("Location:../html/admin.php");
		}
		else
		{
			header("Location:../html/login.php?status=2");
		}
	}
	echo $anvandarnamn;
	echo "<br>";
	echo $password;
?>