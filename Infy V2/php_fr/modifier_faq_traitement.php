<?php 
session_start();  

include('connexionbdd.php'); 
include('fonctions/fonctions_faq.php');

if(isset($_POST["action"]) && $_POST["action"]=="Modifier") {
	$donnees = EditFaq($bdd, htmlspecialchars($_POST["ID"]), htmlspecialchars($_POST["question"]), htmlspecialchars($_POST["reponse"]));
	$donnees->closeCursor();
	header("Location: ../fr/gerer_faq.php");
}

elseif(isset($_POST["action"])  && $_POST["action"]=="Supprimer"){
	$donnees = DeleteFaq($bdd,htmlspecialchars($_POST["ID"]));
	$donnees->closeCursor();
	header("Location: ../fr/gerer_faq.php");
}

elseif(isset($_POST["action"])  && $_POST["action"]=="Ajouter"){
	$donnees = CreateFaq($bdd,htmlspecialchars($_POST["question"]),htmlspecialchars($_POST["reponse"]));
	$donnees->closeCursor();
	header("Location: ../fr/gerer_faq.php");
}

else{
	header("Location: ../fr/gerer_faq.php");
}
?>