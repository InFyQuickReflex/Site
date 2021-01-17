<?php
session_start();

include('connexionbdd.php');

$req = $bdd->prepare("DELETE FROM users WHERE id_user = ?");
$req->execute(array($_GET["ID"]));

$req->closeCursor();

header("Location: ../fr/profil_gestionnaire.php");
?>