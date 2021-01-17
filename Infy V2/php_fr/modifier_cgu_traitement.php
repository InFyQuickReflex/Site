<?php 
session_start(); 

include('connexionbdd.php');
$ID = htmlspecialchars($_POST["ID"]);
$titre= htmlspecialchars($_POST["titre"]);
$paragraphe= htmlspecialchars($_POST["paragraphe"]);


$req = $bdd->prepare("UPDATE CGU SET titre = ?, paragraphe_fr = ? WHERE id_CGU = ?");
$req->execute(array($titre, $paragraphe, $ID));

$req->closeCursor();

header("Location: ../fr/gerer_cgu.php");


?>