<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			$permission = selectpermissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$numero_boitier = htmlspecialchars($_POST['numero']);
				ajouterBoitier($bdd,$numero_boitier);			
			}
		}
header("Location: ../vues_en/gerer_capteurs_en.php");
?>