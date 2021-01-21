<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			include('../php_fr/fonctions/fonctions_permission.php');
			PermissionUser($bdd);
				$numero_capteur = htmlspecialchars($_POST['numero']);
				$id_boitier = htmlspecialchars($_POST['boitier']);
				$id_type = htmlspecialchars($_POST['type']);
				$req = $bdd->prepare("INSERT INTO capteurs (numero_capteur,id_boitier,id_type) VALUES (?,?,?)");
				$req->execute(array($numero_capteur,$id_boitier,$id_type));
				$req->closeCursor();
		}
header("Location: ../fr/gerer_capteurs.php");
?>