<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('../connexionbdd.php');
			include('../fonctions/fonctions_gerer_capteurs.php');
			$permission = permissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$req = $bdd->prepare("DELETE FROM capteurs WHERE id_capteurs = ?");
				$req->execute(array($_POST["ID"]));

				$req->closeCursor();
				echo 'OK';
				
			}
			
		}
?>