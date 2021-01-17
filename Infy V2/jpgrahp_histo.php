<?php
require_once("include_path_inc.php");

require_once("jpgraph.php");
require_once("jpgraph_bar.php");

include('Site/Infy V2/php_fr/connexionbdd.php');


$reponse= $bdd->prepare('SELECT valeur, type FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "rouge" OR type = "bleu" OR type = "blanc" OR type = "vert" ORDER BY type ASC ');
$reponse->execute(array($_GET["IDtest"]));
while($donnees = $reponse->fetch())
{
	$tableauCouleur[] = $donnees['type'];
    $tableauTemps[] = $donnees['valeur'];
}

// Initialisation du graphique
$graph = new Graph(400, 400);

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
$bplot->SetFillColor(array('white', '#1093b0', '#991e0e', '#4f852c'));
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