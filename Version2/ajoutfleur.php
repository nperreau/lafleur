<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
        <?php
            include("connexion.php");
            include("header.php");

            $maxNumRequest = "SELECT MAX(num) AS maxNum FROM plantes;";              
            $maxNumJeuEnreg = $bdd->query($maxNumRequest);
            $maxNumEnreg = $maxNumJeuEnreg->fetch();
            
            $num = $maxNumEnreg["maxNum"] + 1;
            
            $temporaryPath = $_FILES['image']['tmp_name'];
            $image = file_get_contents($temporaryPath);
            $imageData = base64_encode($image);
            $imageToShow = 'data:'.mime_content_type($temporaryPath).';base64,'.$imageData;

            $designation = $_POST["designation"];
            $ref = $_POST["ref"];
            $prix = $_POST["prix"];
            $nomType = $_POST["type"];

            $numTypeRequest = "SELECT num FROM typesplantes WHERE nom='".$nomType."';";
            $numtypeJeuEnreg = $bdd->prepare($numTypeRequest);
            $numtypeJeuEnreg->execute(array('selectedType'=>$nomType));
            $numTypeEnreg = $numtypeJeuEnreg->fetch();

            $numType = $numTypeEnreg["num"];

            $updateRequest = "INSERT INTO plantes (num, designation, ref, prix, numtype, img)
                              VALUES ('".$num."', '".$designation."', '".$ref."', '".$prix."', '".$numType."', '".$imageToShow."');";
            
            if ($bdd->query($updateRequest))
            {
                echo "<p>Nouvelle plante enregistrée dans <a href='plante.php?type=".$nomType."'>".$nomType."</a>.</p>";
            }
            else
            {
                echo "<p>Une erreur est survenue, et la nouvelle plante n'as pas été enregistrée.</p>";
                echo $bdd->error_get_last();
            }
            echo "<p><a href='nouvellefleur.php?defaulttype=".$nomType."'>Cliquez ici pour en ajouter une autre</a>.</p>";
		?>
	</body>
</html>