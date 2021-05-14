<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	if(!isset($_SESSION['anvandare'])) {
		header("Location:login.php");
	}
	$Typ = $_GET["Typ"];
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
		<?php
			require "menu.php";
		?>	
		<main> <!--Huvudinnehåll-->
			<section>
				<form action="inlagg2.php" method="post">
					<p><label for="Text">Skriv här...</label>
					<textarea rows="12" cols="50" id="beskrivning" name="beskrivning"></textarea></p>
					<p><input type="submit" value="Lägg upp"></p>
					<?php
						echo "<input type='hidden' id='Typ' name='Typ' value='{$Typ}'>";
					?>
				</form>
			</section>
		</main>
    </div>
  </body>
</html>
