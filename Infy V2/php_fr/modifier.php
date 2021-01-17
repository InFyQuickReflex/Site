<?php
session_start();

include('connexionbdd.php');

$ID = htmlspecialchars($_POST["ID"]);
$prenom= htmlspecialchars($_POST["prenom"]);
$nom= htmlspecialchars($_POST["nom"]);
$identifiant= htmlspecialchars($_POST["identifiant"]);
$email= htmlspecialchars($_POST["email"]);

$req = $bdd->prepare("UPDATE users SET prenom = ?, nom = ?, identifiant = ?, email = ? WHERE id_user = ?");
$req->execute(array($prenom, $nom, $identifiant, $email, $ID));

$req->closeCursor();

header("Location: ../fr/profil_gestionnaire.php");


?>