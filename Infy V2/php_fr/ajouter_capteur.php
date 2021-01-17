<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			$permission = permissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$numero_capteur = htmlspecialchars($_POST['numero']);
				$id_boitier = htmlspecialchars($_POST['boitier']);
				$id_type = htmlspecialchars($_POST['type']);
				$req = $bdd->prepare("INSERT INTO capteurs (numero_capteur,id_boitier,id_type) VALUES (?,?,?)");
				$req->execute(array($numero_capteur,$id_boitier,$id_type));
				$req->closeCursor();
			
			}
		}
header("Location: ../fr/gerer_capteurs.php");
?>