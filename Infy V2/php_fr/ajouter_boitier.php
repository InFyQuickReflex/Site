<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			include('../php_fr/fonctions/fonctions_permission.php');
			PermissionUser($bdd);
				$numero_boitier = htmlspecialchars($_POST['numero']);
				$req = $bdd->prepare("INSERT INTO boitiers (numero_boitier) VALUES (?)");
				$req->execute(array($numero_boitier));
				$req->closeCursor();
		}
header("Location: ../fr/gerer_capteurs.php");
?>