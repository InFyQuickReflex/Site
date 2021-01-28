<?php
session_start();
require_once("../include_path_inc.php");

require_once("jpgraph.php");
require_once("jpgraph_bar.php");
require_once("jpgraph_line.php");

include('connexionbdd.php');

//Moyenne de toutes les mesures
$reponse= $bdd->prepare('SELECT 
AVG(valeur) AS moyenne
FROM mesures WHERE id_type_mesures = 3
UNION
SELECT 
AVG(valeur) AS moyenne
FROM mesures WHERE id_type_mesures = 4
UNION
SELECT 
AVG(valeur) AS moyenne
FROM mesures WHERE id_type_mesures = 5
UNION
SELECT 
AVG(valeur) AS moyenne
FROM mesures WHERE id_type_mesures = 6
UNION
SELECT 
AVG(valeur) AS moyenne
FROM mesures WHERE id_type_mesures = 7 ');
$reponse->execute();
while($donnees = $reponse->fetch())
{
	$Average[] = $donnees['moyenne'];
}

//Resultat du User
$reponse= $bdd->prepare('SELECT valeur, type_mesures.type_en AS type FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND id_test = ?) WHERE type_mesures.type_en = "sound" OR type_mesures.type_en = "red" OR type_mesures.type_en = "blue" OR type_mesures.type_en = "white" OR type_mesures.type_en = "green"');
$reponse->execute(array($_GET["IDtest"]));

while($donnees = $reponse->fetch())
{
	$Tests[] = $donnees['type'];
	$Results[] = $donnees['valeur'];
}

//Nouveau graphique
$graph = new Graph(400,400);    
$graph->SetScale('textlin');
$graph->img->SetMargin(80,20,20,80);
//Nouveau histogrammes
$bplot = new BarPlot($Average);
$bplot->SetLegend('Average');
$bplot->SetFillColor(array('pink','white', '#1093b0', '#991e0e', '#4f852c'));
//Nouvelle courbe
$l1plot=new LinePlot($Results);
$l1plot->SetColor('black');
$l1plot->SetWeight(2);
$l1plot->SetLegend('Your Results');
//On ajoute les deux courbes
$graph->Add($bplot);
$graph->Add($l1plot);
 
$graph->title->Set('Your spot in the average');
$graph->xaxis->title->Set('Tests');
$graph->yaxis->title->Set('Time');
 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
$graph->xaxis->SetTickLabels($Tests);
$graph->xaxis->SetTitleMargin(15);
$graph->yaxis->SetTitleMargin(60);
$graph->Stroke();

?>
