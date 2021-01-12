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

$req = $bdd->prepare("DELETE FROM users WHERE id_user = ?");
$req->execute(array($_GET["ID"]));

$req->closeCursor();

header("Location: ../fr/profil_gestionnaire.php");
?>