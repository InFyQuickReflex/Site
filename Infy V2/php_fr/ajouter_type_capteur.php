<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			include('../php_fr/fonctions/fonctions_permission.php');
			$permission = selectpermissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$nom_type = htmlspecialchars($_POST['nom']);
				$unite_capteur = htmlspecialchars($_POST['unite']);
				$req = $bdd->prepare("INSERT INTO type_capteurs (nom_type,unite_capteur) VALUES (?,?)");
				$req->execute(array($nom_type,$unite_capteur));
				$req->closeCursor();
			}
		}
header("Location: ../fr/gerer_capteurs.php");
?>