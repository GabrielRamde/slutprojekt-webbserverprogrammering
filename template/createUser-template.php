<?php
$str="";
	if (isset($_GET['anvandarnamn'])) {
		$usr=$_GET['anvandarnamn'];
		$str="anvandarnamn $usr upptaget";
	}
	elseif(isset($_GET['email'])) {
		$ma=$_GET['email'];
		$str="Mailadressen $ma är upptagen";
	}
	if(!empty( $_POST['mail'] ) && !empty ($_POST ['aname']) && !empty ($_POST ['password'])) 
	{
		$email = filter_input(INPUT_POST,'mail', FILTER_SANITIZE_EMAIL, FILTER_FLAG_STRIP_LOW);
		$anvandarnamn = filter_input(INPUT_POST,'aname', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		$password = filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
		
			
		require "../includes/connect.php";
			
		$sql="SELECT * FROM anvandare WHERE anvandarnamn = ? OR email = ?";
		$res=$dbh->prepare($sql);
		$res->bind_param("ss",$anvandarnamn, $email);
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
			<p><label for="mail">Epost:</label>
			<input type="email" id="mail" name="mail"></p>
			<p><label for="anamn">anvandarnamn:</label>
            <input type="text" id="aname" name="aname"></p>
            <p><label for="pwd">Lösenord:</label>
            <input type="password" id="pwd" name="password"></p>
            <p><input type="submit" value="Skapa anvandare"></p>
        </form>
FORM;
	}
?>

<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<title>Logga in</title>
		 <link rel="stylesheet" href="css/stilmall.css">
	</head>
	<body id="login">
		<div id="wrapper">
			<?php
				require "menu.php";
			?>		
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