<?php
	$str="";
	if(!empty( $_POST['anvandarnamn'] ) && !empty ($_POST ['beskrivning']) && !empty ($_POST ['inlaggID']) && !empty ($_POST ['datum'])) 
	{
		$anvandarnamn = filter_input(INPUT_POST,'anvandarnamn', FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_LOW);
		$beskrivning = filter_input(INPUT_POST,'beskrivning', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$inlaggID = filter_input(INPUT_POST,'inlaggID', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$datum = filter_input(INPUT_POST,'datum', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		
		require "../includes/connect.php";
			
		$sql="SELECT * FROM anvandare WHERE anvandarnamn = ?";
		$res=$dbh->prepare($sql);
		$res->bind_param("s",$anvandarnamn);
		$res->execute();
		$result=$res->get_result();
		$row=$result->fetch_assoc();
		
		if($row !== NULL)
		{
			if($row['anvandarnamn']=== $anvandarnamn) {
				header("location:createUser.php?anvandarnamn=$anvandarnamn");
			}
			elseif($row['email'] === $email) {
				header("location;createUser.php?email=$email");
			}
		}
		else
		{
			$status = 1;
			$sql = "INSERT INTO anvandare(anvandarnamn, email, password, status) VALUE (?,?,?,?)";
			$res=$dbh->prepare($sql);
			$res->bind_param("sssi",$anvandarnamn, $email, $password, $status);
			$res->execute();
		}
	}
	else
	{
		$str.=<<<FORM
		<form action="createUser.php" method="post">
			<label for="inlagg">Inlagg</label>
			<textarea id="inlagg" name="inlagg" placeholder="Skriv något.."></textarea>
			<p><input type="submit" value="Skapa inlagg"></p>
		</form>
FORM;
	}
?>

<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<title>Skapa inlagg</title>
		 <link rel="stylesheet" href="css/stilmall.css">
	</head>
	<body id="login">
		<div id="wrapper">
			<main> <!--Huvudinnehåll-->
				<section>
					<?php 
						echo "$str"; 
					?>
				</section>
			</main>
		</div>
	</body>
</html>