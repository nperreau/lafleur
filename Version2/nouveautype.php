<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
		<?php
			include("header.php");

			echo "<form action='ajoutype.php'method='post' enctype='multipart/form-data'>";
			
			echo"<label for='nom'>Nom :</label>
				<input type='text' id='nom' name='nom' required><br>
			    <input type='submit' value='Ajouter'>
			    </form>";
		?>
	</body>
</html>