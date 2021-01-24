<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			$permission = selectpermissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$nom_type = htmlspecialchars($_POST['nom']);
				$unite_capteur = htmlspecialchars($_POST['unite']);
				ajouterTypeCapteur($bdd,$nom_type,$unite_capteur);
			}
		}
header("Location: ../vues_fr/gerer_capteurs.php");
?>