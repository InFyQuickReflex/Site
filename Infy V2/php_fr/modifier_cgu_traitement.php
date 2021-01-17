<?php 
session_start(); 

include('connexionbdd.php');
include('fonctions/fonctions_cgu.php');

if(isset($_POST["action"]) && $_POST["action"]=="Modifier") {
	$donnees = EditCgu($bdd, htmlspecialchars($_POST["ID"]), htmlspecialchars($_POST["titre"]), htmlspecialchars($_POST["paragraphe"]));
	$donnees->closeCursor();
	header("Location: ../fr/gerer_cgu.php");
}

elseif(isset($_POST["action"])  && $_POST["action"]=="Supprimer"){
	$donnees = DeleteCgu($bdd,htmlspecialchars($_POST["ID"]));
	$donnees->closeCursor();
	header("Location: ../fr/gerer_cgu.php");
}

elseif(isset($_POST["action"])  && $_POST["action"]=="Ajouter"){
	$donnees = CreateCgu($bdd,$_POST["titre"],$_POST["paragraphe"]);
	$donnees->closeCursor();
	header("Location: ../fr/gerer_cgu.php");
}

else{
	header("Location: ../fr/gerer_cgu.php");
}
?>