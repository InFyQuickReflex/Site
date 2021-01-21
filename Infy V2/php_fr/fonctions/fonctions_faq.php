<?php
 
function SelectFaq($bdd){
	$req = $bdd->prepare("SELECT * FROM FAQ");
	$req->execute();
	return $req;
}

function CreateFaq($bdd,$titre,$paragraphe){
	$req = $bdd->prepare("INSERT INTO FAQ(question_fr,reponse_fr) VALUES(?, ?)");
	$req->execute(array($titre, $paragraphe));
	return $req;
}

function SelectOneFaq($bdd,$id){
	$req = $bdd->prepare("SELECT * FROM FAQ WHERE id_FAQ = ?");
    $req->execute(array($id));
    return $req;
}

function EditFaq($bdd,$ID,$titre,$paragraphe){
	$req = $bdd->prepare("UPDATE FAQ SET question_fr = ?, reponse_fr = ? WHERE id_FAQ = ?");
	$req->execute(array($titre, $paragraphe, $ID));
	return $req;
}

function DeleteFaq($bdd,$ID){
	$req = $bdd->prepare("DELETE FROM FAQ WHERE id_FAQ = ?");
	$req->execute(array($ID));
	return $req;
}

