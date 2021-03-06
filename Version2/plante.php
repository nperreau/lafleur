<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<meta charset="UTF-8">
	<title>Lafleur</title>
</head>
<body>
	<?php
		include("connexion.php");
		$planteRequest = "SELECT * FROM plantes INNER JOIN typesplantes 
						  ON plantes.numtype=typesplantes.num WHERE typesplantes.nom=:selectedType;";
		
		$nomType = $_GET["type"];
		$planteJeuEnreg = $bdd->prepare($planteRequest);
		$planteJeuEnreg->execute(array('selectedType'=>$nomType));
		$planteEnreg = $planteJeuEnreg->fetch();

		$_POST["selectedTab"] = $nomType;
		include("header.php");
		
		if(!empty($planteEnreg))
		{
			echo "			
			<div id='accueil_body'>
				<br /><br /><br /><br /><br /><br />
				<table>
					<tr>
						<td class='tableTitle'>Photo</td>
						<td class='tableTitle'>Référence</td>
						<td class='tableTitle'>Désignation</td>
						<td class='tableTitle'>Prix</td>
					</tr>";

					while($planteEnreg)
					{
						echo"
						<tr>
						<td class='cell'><img src=".$planteEnreg["img"]."></td>
						<td class='cell'>".$planteEnreg["ref"]."</td>
						<td class='cell'>".$planteEnreg["designation"]."</td>
						<td class='cell'>".$planteEnreg["prix"]."€</td>
						</tr>";
						$planteEnreg = $planteJeuEnreg->fetch();
					}

					echo"
				</table>
			<p> <a href='nouvellefleur.php?defaulttype=".$nomType."'>Ajouter une fleur</a>
			</div>";
		}
		else
		{
			echo "<p> Il n'existe aucune fleur du type \"".$nomType."\".<br>";
			echo "<id='pnouvellefleur'><a href='nouvellefleur.php?defaulttype=".$nomType."'>Cliquez ici pour en créer une.</a></p>";
		}
	?>
</body>
</html>