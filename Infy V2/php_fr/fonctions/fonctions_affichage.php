<?php
function AfficherTemp($bdd,$ID){
	$reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "température"');
    $reponse->execute(array($ID));
    if($donnees = $reponse->fetch())
    {
        echo $donnees["valeur"]." degrés";
    }
    else
    {
        echo "Vous n'avez pas de résultats";
    }
    return $donnees;
} 

function AfficherFreq($bdd, $ID){
	$reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "fréquence"');
    $reponse->execute(array($ID));
    if($donnees = $reponse->fetch())
    {
        echo $donnees["valeur"]." bpms";
    }
    else
    {
        echo "Vous n'avez pas de résultats";
    }
    return $donnees;
}

function AfficherSon($bdd,$ID){
	$reponse= $bdd->prepare('SELECT tests.id_test valeur FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "son"');
    $reponse->execute(array($_GET["IDtest"]));
    if($donnees = $reponse->fetch())
    {
        echo"<p> Vous avez mis ".$donnees["valeur"]." secondes à réagir.</p>";  
    }
    else
    {
        echo"Vous n'avez pas de résultats";
    }
    return $donnees;
}

function AfficherLum($bdd, $ID){
	$reponse= $bdd->prepare('SELECT id_test FROM tests WHERE id_test = ?');
    $reponse->execute(array($_GET["IDtest"]));
    $donnees = $reponse->fetch();
    echo "<img src='../php_fr/graphique_lumiere.php?IDtest=".$donnees["id_test"]."' >";  
    $reponse->closeCursor();
    return $donnees;
}

function AfficherTests($bdd, $ID){
    $req = $bdd->prepare("SELECT users.id_user, id_test, date_test FROM tests INNER JOIN users ON (tests.id_user = users.id_user AND users.id_user = ?) ORDER BY date_test DESC LIMIT 0,4");
    $req->execute(array($ID));
    return $req;
}