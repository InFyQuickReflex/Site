<?php
session_start();

include('connexionbdd.php');

$titre= htmlspecialchars($_POST["titre"]);
$paragraphe= htmlspecialchars($_POST["paragraphe"]);

$req = $bdd->prepare("INSERT INTO CGU(titre,paragraphe_fr) VALUES(?, ?)");
$req->execute(array($titre, $paragraphe));

$req->closeCursor();

header("Location: ../fr/gerer_cgu.php");

?>