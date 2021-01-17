<?php
session_start();

include('connexionbdd.php');

$req = $bdd->prepare("DELETE FROM CGU WHERE id_CGU = ?");
$req->execute(array($_GET["ID"]));

$req->closeCursor();

header("Location: ../fr/gerer_cgu.php");
?>