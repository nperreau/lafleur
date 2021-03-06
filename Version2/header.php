<?php
    include("connexion.php");
    $headerRequest = "SELECT nom FROM typesplantes;";              
    $headerJeuEnreg = $bdd->query($headerRequest);
    $headerEnreg = $headerJeuEnreg->fetch();
    
    echo "
    <header>
        <div id='menu'>
            <div class = 'Element'><b>Sté Lafleur</b></div>
            <div class = 'Element'><a href='accueil.php'>Accueil</a></div>";
            
            if(isset($_GET["addType"]))
                echo "<div class = 'Element'><a href='plante.php?type=".$_GET["addType"]."'>".$_GET["addType"]."</a></div>";

            if (isset($_POST["selectedTab"]))
                $selectedTab = $_POST["selectedTab"];
            else
                $selectedTab = "";

            while($headerEnreg)
            {
                if ($selectedTab == $headerEnreg["nom"])
                    echo "<div class = 'Element'><a href='plante.php?type=".$headerEnreg["nom"]."'>".$headerEnreg["nom"]."</a></div>";
                else
                    echo "<div class = 'Element'><a href='plante.php?type=".$headerEnreg["nom"]."'>".$headerEnreg["nom"]."</a></div>";

                $headerEnreg = $headerJeuEnreg->fetch();
            }

            echo "<div class = 'Element'><a href='nouveautype.php'>+</a></div>
        </div>
    </header>";
?>