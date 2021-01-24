<?php
session_start();

include('connexionbdd.php');
include('fonctions/fonctions_gerer_users.php');

if(isset($_POST["action"]) && $_POST["action"]=="Valider"||$_POST["action"]=="Add") {
	$donnees = CreateUser($bdd,htmlspecialchars($_POST["prenom"]),htmlspecialchars($_POST["nom"]), htmlspecialchars($_POST["identifiant"]),htmlspecialchars($_POST["email"]), password_hash(htmlspecialchars($_POST["mot_de_passe"]), PASSWORD_DEFAULT), htmlspecialchars($_POST["date_de_naissance"]),htmlspecialchars($_POST["telephone"]));
	$donnees->closeCursor();
	if($_POST["action"] == "Valider"){
		header("Location: ../vues_fr/profil_gestionnaire.php");
	}
	elseif($_POST["action"] == "Add"){
		header("Location: ../vues_en/profil_gestionnaire_en.php");
	}

}
elseif (isset($_POST["action"]) && $_POST["action"]=="Modifier" ||$_POST["action"]=="Changer" || $_POST["action"]=="Edit"){
	$donnees = EditUser($bdd,htmlspecialchars($_POST["ID"]),htmlspecialchars($_POST["prenom"]), htmlspecialchars($_POST["nom"]),htmlspecialchars($_POST["identifiant"]), htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["date_de_naissance"]),htmlspecialchars($_POST["telephone"]),htmlspecialchars($_POST["permission"]));
	$donnees->closeCursor();
	if($_POST["action"] == "Modifier"){
		header("Location: ../vues_fr/profil_gestionnaire.php");
	}
	elseif($_POST["action"] == "Changer"){
		header("Location: ../vues_fr/gerer_droits.php");
	}
	elseif($_POST["action"] == "Edit"){
		header("Location: ../vues_en/profil_gestionnaire_en.php");
	}
	
}
elseif (isset($_POST["action"]) && $_POST["action"]=="Supprimer" || $_POST["action"]=="Delete"){
	$donnees = DeleteUser($bdd,htmlspecialchars($_POST["ID"]));
	$donnees->closeCursor();
	if($_POST["action"] == "Supprimer"){
		header("Location: ../vues_fr/profil_gestionnaire.php");
	}
	elseif($_POST["action"] == "Delete"){
		header("Location: ../vues_en/profil_gestionnaire.php");
	}
}
?>
