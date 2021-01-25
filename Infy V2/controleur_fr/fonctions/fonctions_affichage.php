<?php
function AfficherTemp($bdd,$ID){
	$reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND mesures.id_test = ? ) WHERE type_mesures.type = "température"');
    $reponse->execute(array($ID));
    if($donnees = $reponse->fetch())
    { 
        echo $donnees["valeur"]." degrés  ";
    }
    else
    {
        echo "Vous n'avez pas de résultats";
    }
    
    if($donnees["valeur"] >= 38){
        echo "<strong> Température trop haute </strong>";
    }
    elseif($donnees["valeur"] <= 34){
        echo "<strong> Température trop basse </strong>";
    }
    else{
        echo "<em> Température normale </em>";
    }
    return $donnees;
} 

function AfficherFreq($bdd, $ID){
	$reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND mesures.id_test = ? ) WHERE type_mesures.type = "fréquence"');
    $reponse->execute(array($ID));
    if($donnees = $reponse->fetch())
    {
        echo $donnees["valeur"]." bpms";
    }
    else
    {
        echo "Vous n'avez pas de résultats";
    }

    if($donnees["valeur"] >= 100){
        echo "<strong> Fréquence cardiaque trop haute </strong>";
    }
    elseif($donnees["valeur"] <= 55){
        echo "<strong> Fréquence cardiaque trop basse </strong>";
    }
    else{
        echo "<em> Fréquence cardiaque normale </em>";
    }
    return $donnees;
}

function AfficherSon($bdd,$ID){
	$reponse= $bdd->prepare('SELECT ROUND(valeur,3) AS valeur FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND mesures.id_test = ? ) WHERE type_mesures.type = "son"');
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
    echo "<img src='../controleur_fr/graphique_lumiere.php?IDtest=".$donnees["id_test"]."' >";  
    $reponse->closeCursor();
    return $donnees;
}

function AfficherComp($bdd, $ID){
    $reponse= $bdd->prepare('SELECT id_test FROM tests WHERE id_test = ?');
    $reponse->execute(array($_GET["IDtest"]));
    $donnees = $reponse->fetch();
    echo "<img src='../controleur_fr/graphique_comparaison.php?IDtest=".$donnees["id_test"]."' >";  
    $reponse->closeCursor();
    return $donnees;
}

function AfficherTests($bdd, $ID){
    $req = $bdd->prepare("SELECT users.id_user, id_test, date_test FROM tests INNER JOIN users ON (tests.id_user = users.id_user AND users.id_user = ?) ORDER BY date_test DESC LIMIT 0,4");
    $req->execute(array($ID));
    while ($donnees = $req->fetch())
          {

            echo '<p>Test du ' .$donnees["date_test"]. ' : <a href="resultats-'.$donnees["id_user"].'-'.$donnees["id_test"].'"> Voir les résultats </a> </br></p>';      
          }
    return $donnees;
}

