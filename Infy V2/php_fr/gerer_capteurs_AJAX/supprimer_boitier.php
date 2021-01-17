<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('../connexionbdd.php');
			include('../fonctions/fonctions_gerer_capteurs.php');
			$permission = permissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$req = $bdd->prepare("DELETE FROM boitiers WHERE id_boitier = ?");
				$req->execute(array($_POST["ID"]));

				$req->closeCursor();
				
			}
		}
?>