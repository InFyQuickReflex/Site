<?php

function SelectCgu($bdd){
	$req = $bdd->query("SELECT id_CGU, titre_fr, paragraphe_fr FROM CGU");
	return $req;
}

function CreateCgu($bdd,$titre,$paragraphe){
	$req = $bdd->prepare("INSERT INTO CGU(titre_fr,paragraphe_fr) VALUES(?, ?)");
	$req->execute(array($titre, $paragraphe));
	return $req;
}

function SelectOneCgu($bdd,$id){
	$req = $bdd->prepare("SELECT * FROM CGU WHERE id_CGU = ?");
    $req->execute(array($id));
    return $req;
}

function EditCgu($bdd,$ID,$titre,$paragraphe){
	$req = $bdd->prepare("UPDATE CGU SET titre_fr = ?, paragraphe_fr = ? WHERE id_CGU = ?");
	$req->execute(array($titre, $paragraphe, $ID));
	return $req;
}

function DeleteCgu($bdd,$ID){
	$ID = htmlspecialchars($_POST["ID"]);

	$req = $bdd->prepare("DELETE FROM CGU WHERE id_CGU = ?");
	$req->execute(array($ID));
	return $req;
}