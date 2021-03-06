<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<meta charset="UTF-8">
	<title>Lafleur - Accueil</title>
</head>
<body>
	<?php 
	$_POST["selectedTab"] = "Accueil";
	include("header.php");
	?>
	<br />
	<br />
	<br />
	<br />
	<br />
	<div id="accueil_body">
		<div class = "Element">"Dites-le avec Lafleur"</div>
		<br />
		<br />
		<div class = "Element"><img src="../Images/ACCUEIL.jpg"></div>
		<br />
		<br />
		<div class = "Element"><p id="tel">Appelez notre service commercial au <a href="tel:0322846574">03.22.84.65.74</a><br />pour recevoir votre commande.</p></div>
	</div>
</body>
</html>