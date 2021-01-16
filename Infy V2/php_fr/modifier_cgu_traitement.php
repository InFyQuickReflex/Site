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
$titre= htmlspecialchars($_POST["titre"]);
$paragraphe= htmlspecialchars($_POST["paragraphe"]);


$req = $bdd->prepare("UPDATE CGU SET titre = ?, paragraphe = ? WHERE id_CGU = ?");
$req->execute(array($titre, $paragraphe, $ID));

$req->closeCursor();

header("Location: ../fr/gerer_cgu.php");


?>