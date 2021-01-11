<?php
try
{
    $bdd = new PDO("mysql:host=localhost;dbname=infy;charset=utf8", "root", "root");
}

catch (Exception $e)
{
    die("Erreur : " . $e->getMessage());
}

$prenom= htmlspecialchars($_POST["prenom"]);
$nom= htmlspecialchars($_POST["nom"]);
$identifiant= htmlspecialchars($_POST["identifiant"]);
$email= htmlspecialchars($_POST["email"]);
$mot_de_passe= password_hash(htmlspecialchars($_POST["mot_de_passe"]), PASSWORD_DEFAULT);

$req = $bdd->prepare("INSERT INTO users(prenom, nom, identifiant, email, mot_de_passe, permission) VALUES(?, ?, ?, ?, ?, 'utilisateur')");
$req->execute(array($prenom, $nom, $identifiant, $email, $mot_de_passe));

$req->closeCursor();

header("Location: ../fr/profil_gestionnaire.php");

?>
