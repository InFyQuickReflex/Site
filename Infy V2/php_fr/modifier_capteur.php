<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			include('../php_fr/fonctions/fonctions_permission.php');
            PermissionAdmin($bdd);
				$id_capteurs = htmlspecialchars($_POST['ID']);
				$numero_capteur = htmlspecialchars($_POST['numero']);
				$id_boitier = htmlspecialchars($_POST['boitier']);
				$id_type = htmlspecialchars($_POST['type']);
				$req = $bdd->prepare("UPDATE capteurs SET numero_capteur = ?, id_boitier = ?, id_type = ? WHERE id_capteurs = ?");
				$req->execute(array($numero_capteur, $id_boitier, $id_type, $id_capteurs));
				$req->closeCursor();
		}
header("Location: ../fr/gerer_capteurs.php");








?>