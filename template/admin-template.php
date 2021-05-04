<?php
require "../includes/connect.php";

$anvandare = $_SESSION['anvandare'];

$sql="SELECT * FROM anvandare WHERE anvandare=?" ;

$res=$dbh->prepare($sql);
	$res->bind_param("s",$anvandare);
	$res->execute();
	$result=$res->get_result();
	//$row=$result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="sv">
  <head>
     <meta charset="utf-8">
     <title>Admin</title>
		 <link rel="stylesheet" href="css/stilmall.css">
  </head>
    <div id="wrapper">
    <?php
		require "menu.php";
	?>		
		<main> 
			<section id="content">
				<table>
					<thead>
						<tr>
							<th>Username</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while($row=$result->fetch_assoc()) 
							{
								echo "<tr><td>";
								echo $row["Username"];
								echo "</td><td>";
								echo $row["Email"];
								echo "</td></tr>";
							}	
						?>
					</tbody>
				</table>
			</section>
		</main>
	</div>
  </body>
</html>