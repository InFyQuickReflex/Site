<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('../connexionbdd.php');
			include('../fonctions/fonctions_gerer_capteurs.php');
			$permission = permissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$req = $bdd->prepare("DELETE FROM type_capteurs WHERE id_type = ?");
				$req->execute(array($_POST["ID"]));

				$req->closeCursor();
				
			}
		}
?>