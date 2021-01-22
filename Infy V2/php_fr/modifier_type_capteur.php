<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			$permission = selectpermissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$id_type = htmlspecialchars($_POST['ID']);
				$nom_type = htmlspecialchars($_POST['nom']);
				$unite_capteur = htmlspecialchars($_POST['unite']);
				modifierTypeCapteur($bdd,$nom_type,$unite_capteur,$id_type);
			}
		}
header("Location: ../fr/gerer_capteurs.php");
?>