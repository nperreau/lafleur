<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
		<?php
			include("header.php");
			include("connexion.php");
			
			$defaulttype="";
			if (isset($_GET["defaulttype"]))
			{
				$defaulttype=$_GET["defaulttype"];
			}

			$requete = 'SELECT num, nom FROM typesplantes';
			$jeuTypes = $bdd->query($requete);	
			$enreg = $jeuTypes->fetch();

			echo "<form action='ajoutfleur.php'method='post' enctype='multipart/form-data'>";
			
			echo"<label for='designation'>Désignation :</label>
				<input type='text' id='designation' name='designation' required><br>
				<label for='ref'>Référence :</label>
				<input type='text' id='ref' name='ref' required minlength='3' maxlength='3'><br>
				<label for='prix'>Prix :</label>
				<input type='number' id='prix' name='prix' required><br>
				<label for='image'>Image :</label>
				<input type='hidden' name='MAX_FILE_SIZE' value='30000' />
				<input type='file' id='image' name='image' accept='image/*' required><br>";

			echo"<label for='type'>Type :</label>
				<select name='type' id='type'>";
			while($enreg)
			{
				if($enreg["nom"] == $defaulttype)
					echo"<option value='".$enreg["nom"]."' selected='selected'>".$enreg["nom"]."</option>";
				else
					echo"<option value='".$enreg["nom"]."'>".$enreg["nom"]."</option>";
	
				$enreg = $jeuTypes->fetch();
			}
			echo"</select>";

			echo"<input type='submit' value='Ajouter'>
			</form>";
		?>
	</body>
</html>