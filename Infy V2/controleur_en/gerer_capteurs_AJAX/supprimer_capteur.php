<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('../connexionbdd.php');
			include('../fonctions/fonctions_gerer_capteurs.php');
			$permission = selectpermissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				supprimerCapteur($bdd,$_POST['ID']);				
			}
			
		}
?>