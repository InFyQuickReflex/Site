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
				$nom_type = htmlspecialchars($_POST['nom']);
				$unite_capteur = htmlspecialchars($_POST['unite']);
				$req = $bdd->prepare("INSERT INTO type_capteurs (nom_type,unite_capteur) VALUES (?,?)");
				$req->execute(array($nom_type,$unite_capteur));
				$req->closeCursor();
			
			}
		}
header("Location: ../fr/gerer_capteurs.php");
?>