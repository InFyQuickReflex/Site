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

function supprimerCapteur($bdd,$ID) {
	$req = $bdd->prepare("DELETE FROM capteurs WHERE id_capteurs = ?");
	$req->execute(array($ID));
	$req->closeCursor();
}

function supprimerTypeCapteur($bdd,$ID) {
	$req = $bdd->prepare("DELETE FROM type_capteurs WHERE id_type = ?");
	$req->execute(array($ID));
	$req->closeCursor();	
}

function supprimerBoitier($bdd,$ID) {
	$req = $bdd->prepare("DELETE FROM boitiers WHERE id_boitier = ?");
	$req->execute(array($ID));
	$req->closeCursor();
}

function modifierBoitier($bdd,$numero_boitier,$id_boitier) {
	$req = $bdd->prepare("UPDATE boitiers SET numero_boitier = ? WHERE id_boitier = ?");
	$req->execute(array($numero_boitier,$id_boitier));
	$req->closeCursor();
}

function modifierCapteur($bdd,$numero_capteur,$id_boitier,$id_type,$id_capteurs) {
	$req = $bdd->prepare("UPDATE capteurs SET numero_capteur = ?, id_boitier = ?, id_type = ? WHERE id_capteurs = ?");
	$req->execute(array($numero_capteur, $id_boitier, $id_type, $id_capteurs));
	$req->closeCursor();
}

function modifierTypeCapteur($bdd,$nom_type,$unite_capteur,$id_type) {
	$req = $bdd->prepare("UPDATE type_capteurs SET nom_type = ?, unite_capteur = ? WHERE id_type = ?");
	$req->execute(array($nom_type, $unite_capteur, $id_type));
	$req->closeCursor();
}

function ajouterBoitier($bdd,$numero_boitier) {
	$req = $bdd->prepare("INSERT INTO boitiers (numero_boitier) VALUES (?)");
	$req->execute(array($numero_boitier));
	$req->closeCursor();
}

function ajouterCapteur($bdd,$numero_capteur,$id_boitier,$id_type) {
	$req = $bdd->prepare("INSERT INTO capteurs (numero_capteur,id_boitier,id_type) VALUES (?,?,?)");
	$req->execute(array($numero_capteur,$id_boitier,$id_type));
	$req->closeCursor();
}

function ajouterTypeCapteur($bdd,$nom_type,$unite_capteur) {
	$req = $bdd->prepare("INSERT INTO type_capteurs (nom_type,unite_capteur) VALUES (?,?)");
	$req->execute(array($nom_type,$unite_capteur));
	$req->closeCursor();
}

function selectpermissionUser($bdd,$ID)
{
	$req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
	$req->execute(array($ID));
	$donnees = $req->fetch();
	return $donnees['permission'];
}
?>