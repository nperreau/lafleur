<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
        <?php
            include("connexion.php");

            $nom = $_POST["nom"];

            $_GET["addType"] = $nom;
            include("header.php");

            $maxNumRequest = "SELECT MAX(num) AS maxNum FROM typesplantes;";              
            $maxNumJeuEnreg = $bdd->query($maxNumRequest);
            $maxNumEnreg = $maxNumJeuEnreg->fetch();
            
            $num = $maxNumEnreg["maxNum"] + 1;

            $updateRequest = "INSERT INTO typesplantes (num, nom)
                              VALUES ('".$num."', '".$nom."');";
            
            if ($bdd->query($updateRequest))
            {
                echo "<p>Le nouveau type <a href='plante.php?type=".$nom."'>".$nom."</a> as été enregistré.</p>";
            }
            else
            {
                echo "<p>Une erreur est survenue, et le nouveaux type n'as pas été enregistrée.</p>";
                echo $bdd->error_get_last();
            }
            echo "<p><a href='nouvellefleur.php?defaulttype=".$nom."'>Cliquez ici pour ajouter une plante</a>.</p>";
		?>
	</body>
</html>