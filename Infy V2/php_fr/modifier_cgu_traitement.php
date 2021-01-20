<?php 
session_start();  

include('connexionbdd.php'); 
include('fonctions/fonctions_cgu.php');

if(isset($_POST["action"]) && $_POST["action"]=="Modifier" || $_POST["action"]=="Edit"){
	
	if($_POST["action"]=="Modifier"){
	$donnees = EditCgu($bdd, htmlspecialchars($_POST["ID"]), htmlspecialchars($_POST["titre"]), htmlspecialchars($_POST["paragraphe"]));
	$donnees->closeCursor();
		header("Location: ../fr/gerer_cgu.php");
	}
	elseif($_POST["action"]=="Edit"){
	$donnees = EditCguEn($bdd, htmlspecialchars($_POST["ID"]), htmlspecialchars($_POST["titre_en"]), htmlspecialchars($_POST["paragraphe_en"]));
	$donnees->closeCursor();
	header("Location: ../en/gerer_cgu_en.php");
	}
}

elseif(isset($_POST["action"])  && $_POST["action"]=="Supprimer" || $_POST["action"]=="Delete"){
	$donnees = DeleteCgu($bdd,htmlspecialchars($_POST["ID"]));
	$donnees->closeCursor();
	if($_POST["action"]=="Supprimer"){
		header("Location: ../fr/gerer_cgu.php");
	}
	elseif($_POST["action"]=="Delete"){
		header("Location: ../en/gerer_cgu_en.php");
	}
}

elseif(isset($_POST["action"])  && $_POST["action"]=="Ajouter" || $_POST["action"]=="Add" ){
	$donnees = CreateCgu($bdd,htmlspecialchars($_POST["titre_fr"]),htmlspecialchars($_POST["paragraphe_fr"]), htmlspecialchars($_POST["titre_en"]), htmlspecialchars($_POST["paragraphe_en"]),);
	$donnees->closeCursor();
	if($_POST["action"]=="Ajouter"){
		header("Location: ../fr/gerer_cgu.php");
	}
	elseif($_POST["action"]=="Add"){
		header("Location: ../en/gerer_cgu_en.php");
	}
}

else{
	header("Location: ../fr/gerer_cgu.php");
}
?>