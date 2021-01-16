<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions_gerer_capteurs.php');
			$permission = permissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$id_type = htmlspecialchars($_POST['ID']);
				$nom_type = htmlspecialchars($_POST['nom']);
				$unite_capteur = htmlspecialchars($_POST['unite']);
				$req = $bdd->prepare("UPDATE type_capteurs SET nom_type = ?, unite_capteur = ? WHERE id_type = ?");
				$req->execute(array($nom_type, $unite_capteur, $id_type));
				$req->closeCursor();
			}
		}
header("Location: ../fr/gerer_capteurs.php");
?>