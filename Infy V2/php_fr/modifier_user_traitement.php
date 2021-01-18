<?php
session_start();

include('connexionbdd.php');
include('fonctions/fonctions_gerer_users.php');

if(isset($_POST["action"]) && $_POST["action"]=="Valider") {
	$donnees = CreateUser($bdd,htmlspecialchars($_POST["prenom"]),htmlspecialchars($_POST["nom"]), htmlspecialchars($_POST["identifiant"]),htmlspecialchars($_POST["email"]), password_hash(htmlspecialchars($_POST["mot_de_passe"]), PASSWORD_DEFAULT), htmlspecialchars($_POST["date_de_naissance"]),htmlspecialchars($_POST["telephone"]));

	$donnees->closeCursor();
	header("Location: ../fr/profil_gestionnaire.php");
}
elseif (isset($_POST["action"]) && $_POST["action"]=="Modifier"){
	$donnees = EditUser($bdd,htmlspecialchars($_POST["ID"]),htmlspecialchars($_POST["prenom"]), htmlspecialchars($_POST["nom"]),htmlspecialchars($_POST["identifiant"]), htmlspecialchars($_POST["email"]), htmlspecialchars($_POST["date_de_naissance"]),htmlspecialchars($_POST["telephone"]));
	$donnees->closeCursor();
	header("Location: ../fr/profil_gestionnaire.php");
}
elseif (isset($_POST["action"]) && $_POST["action"]=="Supprimer"){
	$donnees = DeleteUser($bdd,htmlspecialchars($_POST["ID"]));
	$donnees->closeCursor();
	header("Location: ../fr/profil_gestionnaire.php");
}
?>
