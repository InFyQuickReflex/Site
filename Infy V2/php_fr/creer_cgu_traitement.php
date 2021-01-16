<?php
try
{
    $bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
}

catch (Exception $e)
{
    die("Erreur : " . $e->getMessage()); 
}


$titre= htmlspecialchars($_POST["titre"]);
$paragraphe= htmlspecialchars($_POST["paragraphe"]);

$req = $bdd->prepare("INSERT INTO CGU(titre,paragraphe) VALUES(?, ?)");
$req->execute(array($titre, $paragraphe));

$req->closeCursor();

header("Location: ../fr/gérer_cgu.php");

?>