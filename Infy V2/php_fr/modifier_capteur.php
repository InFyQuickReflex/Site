<?php
session_start();
if(isset($_SESSION["ID"]))
        {
			try
			{
				$bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
			}

			catch (Exception $e)
			{
				die("Erreur : " . $e->getMessage());
			}

			$req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
			$req->execute(array($_SESSION["ID"]));
			$donnees = $req->fetch();
			if($donnees["permission"] == "administrateur")
			{
				$id_capteurs = htmlspecialchars($_POST['ID']);
				$numero_capteur = htmlspecialchars($_POST['numero']);
				$id_boitier = htmlspecialchars($_POST['boitier']);
				$id_type = htmlspecialchars($_POST['type']);
				$req = $bdd->prepare("UPDATE capteurs SET numero_capteur = ?, id_boitier = ?, id_type = ? WHERE id_capteurs = ?");
				$req->execute(array($numero_capteur, $id_boitier, $id_type, $id_capteurs));
				$req->closeCursor();
			}
		}
header("Location: ../fr/gerer_capteurs.php");








?>