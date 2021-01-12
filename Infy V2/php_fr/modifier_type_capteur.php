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
				$id_type = htmlspecialchars($_POST['ID']);
				$nom_type = htmlspecialchars($_POST['nom']);
				$unite_capteur = htmlspecialchars($_POST['unite']);
				$req = $bdd->prepare("UPDATE type_capteurs SET nom_type = ?, unite_capteur = ? WHERE id_type = ?");
				$req->execute(array($nom_type, $unite_capteur, $id_type));
				$req->closeCursor();
			}
		}
header("Location: ../fr/gerer_capteurs.php");








?>