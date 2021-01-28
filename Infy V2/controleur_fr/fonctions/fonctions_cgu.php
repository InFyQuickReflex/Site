<?php

function SelectCgu($bdd){
	$req = $bdd->prepare("SELECT * FROM CGU");
	$req->execute();
    return $req;
}

function SelectCguUser($bdd){
	$req = $bdd->prepare("SELECT * FROM CGU");
	$req->execute();
	return $req;
} 

function CreateCgu($bdd, $titre_fr, $paragraphe_fr, $titre_en, $paragraphe_en){
	$req = $bdd->prepare("INSERT INTO CGU(titre_fr,paragraphe_fr,titre_en,paragraphe_en) VALUES(?, ?,?,?)");
	$req->execute(array($titre_fr, $paragraphe_fr, $titre_en, $paragraphe_en));
	return $req;
}

function SelectOneCgu($bdd, $ID){
	$req = $bdd->prepare("SELECT * FROM CGU WHERE id_CGU = ?");
    $req->execute(array($ID));
    $rep = $req->fetch();
    return $rep;
}

function EditCgu($bdd, $ID, $titre_fr, $paragraphe_fr, $titre_en, $paragraphe_en){
	$req = $bdd->prepare("UPDATE CGU SET titre_fr = ?, paragraphe_fr = ?, titre_en = ?, paragraphe_en = ? WHERE id_CGU = ?");
	$req->execute(array($titre_fr, $paragraphe_fr, $titre_en, $paragraphe_en, $ID));
	return $req;
}

function DeleteCgu($bdd, $ID){
	$ID = htmlspecialchars($_POST["ID"]);
	$req = $bdd->prepare("DELETE FROM CGU WHERE id_CGU = ?");
	$req->execute(array($ID));
	return $req;
}