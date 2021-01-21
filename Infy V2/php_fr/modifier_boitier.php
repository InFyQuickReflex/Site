<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			include('../php_fr/fonctions/fonctions_permission.php');
            PermissionUser($bdd);
				$id_boitier = htmlspecialchars($_POST['ID']);
				$numero_boitier = htmlspecialchars($_POST['numero']);
				$req = $bdd->prepare("UPDATE boitiers SET numero_boitier = ? WHERE id_boitier = ?");
				$req->execute(array($numero_boitier,$id_boitier));
				$req->closeCursor();
		}
header("Location: ../fr/gerer_capteurs.php");
?>