<?php
session_start();

try
{
	 $bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
}

catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$reponse = $bdd->query("SELECT * FROM users");

$_verif = FALSE;

while($donnees = $reponse->fetch())
{
    $identifiant = htmlspecialchars($_POST["identifiant"]);
    $mot_de_passe = htmlspecialchars($_POST["mot_de_passe"]);

    if(($identifiant == $donnees["identifiant"]) AND (password_verify($mot_de_passe, $donnees["mot_de_passe"])))
    {
        $_verif = TRUE;
        $_SESSION["ID"] = $donnees["id"];
        $_permission = $donnees["permission"];
        break;
    }   
}

$reponse->closeCursor();

if($_verif)
{
    if($_permission  == "utilisateur")
    {
        header("Location: ../fr/profil_utilisateur.php");
    }

    else if($_permission  == "gestionnaire")
    {
        header("Location: ../fr/profil_gestionnaire.php");
    }

    else if($_permission  == "administrateur")
    {
        header("Location: ../fr/profil_administrateur.php");
    }   
}

else
{
    header("Location: ../fr/page_connexion_erreur.php");
}
?>