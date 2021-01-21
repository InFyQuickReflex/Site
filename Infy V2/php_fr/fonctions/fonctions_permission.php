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

function PermissionAdmin($bdd){
    $req = $bdd->prepare("SELECT prenom, nom, identifiant, email, permission FROM users WHERE id_user = ?");
    $req->execute(array($_SESSION["ID"]));
    $donnees = $req->fetch();

    if($donnees["permission"] != "administrateur")
    {
        if($donnees["permission"] == "gestionnaire")
        {
            header("Location: profil_gestionnaire.php");
        }

        else if($donnees["permission"] == "utilisateur")
        {
            header("Location: profil_utilisateur.php");
        } 
    }
    return $donnees;
}

function PermissionGestion($bdd){
    $req = $bdd->prepare("SELECT prenom, nom, identifiant, email, permission FROM users WHERE id_user = ?");
    $req->execute(array($_SESSION["ID"]));
    $donnees = $req->fetch();

    if($donnees["permission"] != "gestionnaire")
    {
        if($donnees["permission"] == "administrateur")
        {
            header("Location: profil_administrateur.php");
        }

        else if($donnees["permission"] == "utilisateur")
        {
            header("Location: profil_utilisateur.php");
        } 
    }
    return $donnees;
}

function ChangePerm($bdd, $ID){
    $req = $bdd->prepare("SELECT * FROM users WHERE id_user = ?");
    $req->execute(array($ID));
    $donnees = $req->fetch();
    return $donnees;
}