<?php
function AfficherTemp($bdd,$ID){
	$reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND mesures.id_test = ? ) WHERE type_mesures.type = "température"');
    $reponse->execute(array($ID));
    return $reponse;
} 

function AfficherFreq($bdd, $ID){
	$reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND mesures.id_test = ? ) WHERE type_mesures.type = "fréquence"');
    $reponse->execute(array($ID));
    return $reponse;
}

function AfficherSon($bdd,$ID){
	$reponse= $bdd->prepare('SELECT ROUND(valeur,3) AS valeur FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND mesures.id_test = ? ) WHERE type_mesures.type = "son"');
    $reponse->execute(array($ID));
    return $reponse;
}

function AfficherTests($bdd, $ID){
    $req = $bdd->prepare("SELECT users.id_user, id_test, date_test FROM tests INNER JOIN users ON (tests.id_user = users.id_user AND users.id_user = ?) ORDER BY date_test DESC LIMIT 0,4");
    $req->execute(array($ID));
    return $req;
}

