<?php
function selectToutCapteur($bdd) {
	$req = $bdd->query("SELECT id_capteurs, numero_capteur, nom_type, unite_capteur AS unite_type,id_boitier
			FROM capteurs INNER JOIN type_capteurs
			ON capteurs.id_type = type_capteurs.id_type
			ORDER BY capteurs.id_capteurs");
	return $req;
}

function selectToutTypeCapteur($bdd) {
	$req = $bdd->query('SELECT * FROM type_capteurs');
	return $req;
}

function selectToutBoitier($bdd) {
	$req = $bdd->query('SELECT * FROM boitiers');
	return $req;
}

function selectCapteur($bdd,$ID) {
	$req = $bdd->prepare("SELECT * FROM capteurs WHERE id_capteurs = ?");
    $req->execute(array($ID));
    return $req;
}

function selectTypeCapteur($bdd,$ID) {
	$req = $bdd->prepare("SELECT * FROM type_capteurs WHERE id_type = ?");
	$req->execute(array($ID));
	return $req;
}

function selectBoitier($bdd,$ID) {
	$req = $bdd->prepare("SELECT * FROM boitiers WHERE id_boitier = ?");
	$req->execute(array($ID));
	return $req;
}

function permissionUser($bdd,$ID)
{
	$req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
	$req->execute(array($ID));
	$donnees = $req->fetch();
	return $donnees['permission'];
}
?>