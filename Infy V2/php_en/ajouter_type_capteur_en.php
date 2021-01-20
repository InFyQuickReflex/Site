<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			$permission = permissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$nom_type = htmlspecialchars($_POST['nom']);
				$unite_capteur = htmlspecialchars($_POST['unite']);
				$req = $bdd->prepare("INSERT INTO type_capteurs (nom_type,unite_capteur) VALUES (?,?)");
				$req->execute(array($nom_type,$unite_capteur));
				$req->closeCursor();
			
			}
		}
header("Location: ../en/gerer_capteurs_en.php");
?>