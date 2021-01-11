<?php
session_start();

try
{
    $bdd = new PDO("mysql:host=localhost;dbname=infy;charset=utf8", "root", "root");
}

catch (Exception $e)
{
    die("Erreur : " . $e->getMessage());
}

$req = $bdd->prepare("DELETE FROM users WHERE ID = ?");
$req->execute(array($_GET["ID"]));

$req->closeCursor();

header("Location: ../fr/profil_gestionnaire.php");
?>