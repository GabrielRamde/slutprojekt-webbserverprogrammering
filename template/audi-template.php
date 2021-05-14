<?php
	session_start();
	require "../includes/connect.php";
	
	$sql = "SELECT * FROM inlagg WHERE Typ = 1";
	$res = $dbh -> prepare($sql);
	$res->execute();
	$result = $res->get_result();
?>
<!DOCTYPE html>
<html lang="sv">
	<head>
		<meta charset="utf-8">
		<title>Audi</title>
		<link rel="stylesheet" href="css/stilmall.css">
	</head>
	<body id="audi">
		<div id="wrapper">
			<?php
				require "menu.php";
			?>	
			<aside>
				<p>	Här kan du skriva om Audi. Vad du gillar och vad du inte gillar samt nyttig information om bilmärket. Tänk på vad du skriver, om det är olämpligt kan Admins ta bort ditt inlägg
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
				when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into 
				electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, 
				and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
			</aside>
			<main class="content">
				<h2>INLÄGG</h2>
				<a href="inlagg.php?Typ=1">Skapa Inlägg</a>
				<?php
				while($row = $result->fetch_assoc()) {
				$inc = "";
				if(isset($_SESSION['anvandare'])) {
					if($_SESSION["status"] == 2) {
					$inc = "<a href='removePost.php?id={$row["inlaggID"]}'>Ta bort inlägg</a>";
				}	
				}
				echo <<<ARTICLE
					<article>
						<p>{$row["beskrivning"]}</p>
						<p>Skriven av: {$row['anvandarnamn']} | inlägg:{$row['inlaggID']}</p>
						{$inc}
					</article>
ARTICLE;
				}		
				?>
			</main>
		</div>
	</body>
</html>