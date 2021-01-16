<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions_gerer_capteurs.php');
			$permission = permissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$numero_boitier = htmlspecialchars($_POST['numero']);
				$req = $bdd->prepare("INSERT INTO boitiers (numero_boitier) VALUES (?)");
				$req->execute(array($numero_boitier));
				$req->closeCursor();
			
			}
		}
header("Location: ../fr/gerer_capteurs.php");
?>