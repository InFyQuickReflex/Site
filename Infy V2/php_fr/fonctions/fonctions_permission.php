<?php 

function PermissionUser($bdd){
	$req = $bdd->prepare("SELECT prenom, nom, identifiant, email, permission FROM users WHERE id_user = ?");
    $req->execute(array($_SESSION["ID"]));
    $donnees = $req->fetch();

    if($donnees["permission"] != "utilisateur")
    {
        if($donnees["permission"] == "administrateur")
        {
            header("Location: profil_administrateur.php");
        }
        else if($donnees["permission"] == "gestionnaire")
        {
            header("Location: profil_gestionnaire.php");
        }   
    }
    return $donnees;
}