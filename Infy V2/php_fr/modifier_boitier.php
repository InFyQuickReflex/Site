<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			include('connexionbdd.php');
			include('fonctions/fonctions_gerer_capteurs.php');
			$permission = selectpermissionUser($bdd,$_SESSION["ID"]);
			if($permission == "administrateur")
			{
				$id_boitier = htmlspecialchars($_POST['ID']);
				$numero_boitier = htmlspecialchars($_POST['numero']);
				$req = $bdd->prepare("UPDATE boitiers SET numero_boitier = ? WHERE id_boitier = ?");
				$req->execute(array($numero_boitier,$id_boitier));
				$req->closeCursor();
			}
		}
header("Location: ../fr/gerer_capteurs.php");
?>