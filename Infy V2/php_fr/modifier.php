<?php
session_start();

try
{
     $bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
}

catch (Exception $e)
{
    die("Erreur : " . $e->getMessage());
}

$ID = htmlspecialchars($_POST["ID"]);
$prenom= htmlspecialchars($_POST["prenom"]);
$nom= htmlspecialchars($_POST["nom"]);
$identifiant= htmlspecialchars($_POST["identifiant"]);
$email= htmlspecialchars($_POST["email"]);

$req = $bdd->prepare("UPDATE users SET prenom = ?, nom = ?, identifiant = ?, email = ? WHERE ID = ?");
$req->execute(array($prenom, $nom, $identifiant, $email, $ID));

$req->closeCursor();

header("Location: ../fr/profil_gestionnaire.php");


?>