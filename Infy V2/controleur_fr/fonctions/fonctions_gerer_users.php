<?php
function CreateUser ($bdd,$prenom, $nom, $identifiant, $email, $mot_de_passe, $date_de_naissance, $telephone){
	$req = $bdd->prepare("INSERT INTO users(prenom, nom, identifiant, email, mot_de_passe, permission, date_de_naissance, telephone) VALUES(?, ?, ?, ?, ?, 'utilisateur', ?, ?)");
	$req->execute(array($prenom, $nom, $identifiant, $email, $mot_de_passe, $date_de_naissance, $telephone));
	return $req;
}

function EditUser ($bdd,$ID, $prenom, $nom, $identifiant, $email, $date_de_naissance, $telephone, $permission){
	$req = $bdd->prepare("UPDATE users SET prenom = ?, nom = ?, identifiant = ?, email = ?, date_de_naissance = ?, telephone = ?, permission = ? WHERE id_user = ?");
	$req->execute(array($prenom, $nom, $identifiant, $email, $date_de_naissance, $telephone, $permission, $ID));
	return $req;
}

function DeleteUser($bdd, $ID){
	$req = $bdd->prepare("DELETE FROM users WHERE id_user = ?");
	$req->execute(array($ID));
	return $req;
}

function SelectUser($bdd, $ID){
	$req = $bdd->prepare("SELECT * FROM users WHERE id_user = ?");
    $req->execute(array($ID));
    $rep = $req->fetch();
    return $rep;
}

function SelectAllUser($bdd){
	$req = $bdd->query("SELECT id_user, prenom, nom, identifiant FROM users ORDER BY nom");
	return $req;
}
