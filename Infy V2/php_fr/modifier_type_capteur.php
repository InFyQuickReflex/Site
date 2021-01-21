<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			include('../php_fr/fonctions/fonctions_permission.php');
            PermissionAdmin($bdd);
				$id_type = htmlspecialchars($_POST['ID']);
				$nom_type = htmlspecialchars($_POST['nom']);
				$unite_capteur = htmlspecialchars($_POST['unite']);
				$req = $bdd->prepare("UPDATE type_capteurs SET nom_type = ?, unite_capteur = ? WHERE id_type = ?");
				$req->execute(array($nom_type, $unite_capteur, $id_type));
				$req->closeCursor();
		}
header("Location: ../fr/gerer_capteurs.php");
?>