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
				<form action="../template/login2.php" method="post">
					<p class="create"><a href="createinlagg.php">Skapa inlägg</a></p>
				</form>
			</section>
		</main>
    </div>
  </body>
</html>
