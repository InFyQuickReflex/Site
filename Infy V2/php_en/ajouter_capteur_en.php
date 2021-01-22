<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			$permission = selectpermissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$numero_capteur = htmlspecialchars($_POST['numero']);
				$id_boitier = htmlspecialchars($_POST['boitier']);
				$id_type = htmlspecialchars($_POST['type']);
				ajouterCapteur($bdd,$numero_capteur,$id_boitier,$id_type);
			}
		}
header("Location: ../en/gerer_capteurs_en.php");
?>