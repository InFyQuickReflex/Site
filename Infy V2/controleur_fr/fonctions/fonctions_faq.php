<?php 
function SelectFaqUser($bdd){
	$req = $bdd->prepare("SELECT * FROM FAQ");
	$req->execute();
	return $req;
}

function SelectFaq($bdd){
	$req = $bdd->prepare("SELECT * FROM FAQ");
	$req->execute();
	return $req;
}

function CreateFaq($bdd, $titre, $paragraphe, $titre_en, $paragraphe_en){
	$req = $bdd->prepare("INSERT INTO FAQ(question_fr,reponse_fr,question_en,reponse_en) VALUES(?, ?, ?, ?)");
	$req->execute(array($titre, $paragraphe, $titre_en, $paragraphe_en));
	return $req;
}

function SelectOneFaq($bdd,$ID){
	$req = $bdd->prepare("SELECT * FROM FAQ WHERE id_FAQ = ?");
    $req->execute(array($ID));
    $rep = $req->fetch();
    return $rep;
}

function EditFaq($bdd, $ID, $titre_fr, $paragraphe_fr, $titre_en, $paragraphe_en){
	$req = $bdd->prepare("UPDATE FAQ SET question_fr = ?, reponse_fr = ?, question_en = ?, reponse_en = ?  WHERE id_FAQ = ?");
	$req->execute(array($titre_fr, $paragraphe_fr, $titre_en, $paragraphe_en, $ID));
	return $req;
}

function DeleteFaq($bdd,$ID){
	$req = $bdd->prepare("DELETE FROM FAQ WHERE id_FAQ = ?");
	$req->execute(array($ID));
	return $req;
}

