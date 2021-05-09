<?php
session_start();

require_once("../include_path_inc.php");

require_once("jpgraph.php");
require_once("jpgraph_bar.php");

include('connexionbdd.php');


$reponse= $bdd->prepare('SELECT valeur, type_mesures.type FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND id_test = ?) WHERE type_mesures.type = "rouge" OR type_mesures.type = "bleu" OR type_mesures.type = "blanc" OR type_mesures.type = "vert" ORDER BY type ASC');
$reponse->execute(array($_GET["IDtest"]));
while($donnees = $reponse->fetch())
{
	$tableauCouleur[] = $donnees['type'];
    $tableauTemps[] = $donnees['valeur'];
}

// Initialisation du graphique
$graph = new Graph(600, 500);

// Echelle lineaire ('lin') en ordonnee et pas de valeur en abscisse ('text')
// Valeurs min et max seront determinees automatiquement
$graph->setScale("textlin");

// Fixer les marges
$graph->img->SetMargin(80,20,20,80);


// Creation de l'histogramme
$bplot = new BarPlot($tableauTemps);

// Ajout de l'histogramme au graphique
$graph->add($bplot);

// Afficher les valeurs pour chaque barre
//$bplot->value->Show();

// Spécification des couleurs des barres
$bplot->SetFillColor(array('white','#196682','#8a152e','#206339'));
// Ajout du titre du graphique
//$graph->title->set("Temps de réaction en fonction de la couleur");

// Titre pour l'axe horizontal(axe x) et vertical (axe y)

$graph->xaxis->title->Set("Couleur de la lumière","middle");
$graph->yaxis->title->Set("Temps en secondes","middle");
//Légende de l'axe horizontal et espacement entre le titre et l'axe
$graph->xaxis->SetTickLabels($tableauCouleur);
$graph->xaxis->SetTitleMargin(15);
$graph->yaxis->SetTitleMargin(60);

// Affichage du graphique
$graph->stroke();
