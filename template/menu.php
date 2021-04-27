<?php
	if(!isset($_SESSION['username'])) {
		echo<<<NAV
		<nav><!--Navigationsmeny-->
			<ul>	
				<li><a href="audi.php">Audi</a></li>
				<li<a href="index.php">Bilblogg</a></li>
				<li><a href="bmw.php">BMW</a></li>
				<li><a href="login.php">Logga in / Registrera dig</a></li>
			</ul>
		</nav>
NAV;
	}
	else{
		if($_SESSION['status']==1){
			echo<<<NAV
			<nav>
				<u1>
					<li><a href="audi.php">Audi</a></li>
					<li<a href="index.php">Bilblogg</a></li>
					<li><a href="bmw.php">BMW</a></li>
					<li><a href="login.php">Logga in / Registrera dig</a></li>
				</ul>
			</nav>
NAV;
	}
	elseif($_SESSION['status']==2){
			echo<<<NAV
			<nav>
				<u1>
					<li><a href="audi.php">Audi</a></li>
					<li<a href="index.php">Bilblogg</a></li>
					<li><a href="bmw.php">BMW</a></li>
					<li><a href="login.php">Logga in / Registrera dig</a></li>
				</ul>
			</nav>
NAV;
		}
	}