<?php 
session_start();  

include('connexionbdd.php'); 
include('fonctions/fonctions_faq.php');

if(isset($_POST["action"]) && $_POST["action"]=="Modifier" || $_POST["action"]=="Edit"){
	$donnees = EditFaq($bdd, htmlspecialchars($_POST["ID"]), htmlspecialchars($_POST["question"]), htmlspecialchars($_POST["reponse"]), htmlspecialchars($_POST["question_en"]), htmlspecialchars($_POST["reponse_en"]));
	$donnees->closeCursor();
	if($_POST["action"]=="Modifier"){
		header("Location: ../vues_fr/gerer_faq.php");
	}
	elseif($_POST["action"]=="Edit"){
		header("Location: ../vues_en/gerer_faq_en.php");
	}

}

elseif(isset($_POST["action"])  && $_POST["action"]=="Supprimer" || $_POST["action"]=="Delete"){
	$donnees = DeleteFaq($bdd,htmlspecialchars($_POST["ID"]));
	$donnees->closeCursor();
	if($_POST["action"]=="Supprimer"){
		header("Location: ../vues_fr/gerer_faq.php");
	}
	elseif($_POST["action"]=="Delete"){
		header("Location: ../vues_en/gerer_faq_en.php");
	}
}

elseif(isset($_POST["action"])  && $_POST["action"]=="Ajouter" || $_POST["action"]=="Add" ){
	$donnees = CreateFaq($bdd,htmlspecialchars($_POST["question"]),htmlspecialchars($_POST["reponse"]), htmlspecialchars($_POST["question_en"]), htmlspecialchars($_POST["reponse_en"]));
	$donnees->closeCursor();
	if($_POST["action"]=="Ajouter"){
		header("Location: ../vues_fr/gerer_faq.php");
	}
	elseif($_POST["action"]=="Add"){
		header("Location: ../vues_en/gerer_faq_en.php");
	}
}
?>