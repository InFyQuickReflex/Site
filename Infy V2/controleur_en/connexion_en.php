<?php
session_start();

include('connexionbdd.php');

$reponse = $bdd->query("SELECT * FROM users");

$_verif = FALSE;

while($donnees = $reponse->fetch())
{
    $identifiant = htmlspecialchars($_POST["identifiant"]);
    $mot_de_passe = htmlspecialchars($_POST["mot_de_passe"]);

    if(($identifiant == $donnees["identifiant"]) AND (password_verify($mot_de_passe, $donnees["mot_de_passe"])))
    {
        $_verif = TRUE;
        $_SESSION["ID"] = $donnees["id_user"];
        $_permission = $donnees["permission"];
        break;
    }   
}

$reponse->closeCursor();

if($_verif)
{
    if($_permission  == "utilisateur")
    {
        header("Location: ../vues_en/profil_utilisateur_en.php");
    }

    else if($_permission  == "gestionnaire")
    {
        header("Location: ../vues_en/profil_gestionnaire_en.php");
    }

    else if($_permission  == "administrateur")
    {
        header("Location: ../vues_en/profil_administrateur_en.php");
    }   
}

else
{
    header("Location: ../vues_fr/page_connexion_erreur.php");
}
?>