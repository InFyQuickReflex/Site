<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			include('../php_fr/fonctions/fonctions_permission.php');
            PermissionAdmin($bdd);
				$req = $bdd->prepare("DELETE FROM type_capteurs WHERE id_type = ?");
				$req->execute(array($_GET["ID"]));

				$req->closeCursor();
		}
			

header("Location: ../fr/gerer_capteurs.php");
?>