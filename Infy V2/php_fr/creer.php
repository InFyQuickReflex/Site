<?php
include('connexionbdd.php');

$prenom= htmlspecialchars($_POST["prenom"]);
$nom= htmlspecialchars($_POST["nom"]);
$identifiant= htmlspecialchars($_POST["identifiant"]);
$email= htmlspecialchars($_POST["email"]);
$mot_de_passe= password_hash(htmlspecialchars($_POST["mot_de_passe"]), PASSWORD_DEFAULT);
$date_de_naissance= htmlspecialchars($_POST["date_de_naissance"]);
$telephone= htmlspecialchars($_POST["telephone"]);

$req = $bdd->prepare("INSERT INTO users(prenom, nom, identifiant, email, mot_de_passe, permission, date_de_naissance, telephone) VALUES(?, ?, ?, ?, ?, 'utilisateur', ?, ?)");
$req->execute(array($prenom, $nom, $identifiant, $email, $mot_de_passe, $date_de_naissance, $telephone));

$req->closeCursor();

header("Location: ../fr/profil_gestionnaire.php");

?>
