<?php
session_start();
require_once("../include_path_inc.php");

require_once("jpgraph.php");
require_once("jpgraph_line.php");
require_once("jpgraph_bar.php");

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
	$Moyenne[] = $donnees['moyenne'];
}

//Resultat du User
$reponse= $bdd->prepare('SELECT valeur, type_mesures.type AS type FROM mesures INNER JOIN type_mesures ON (type_mesures.id_type_mesures = mesures.id_type_mesures AND id_test = ?) WHERE type_mesures.type = "son" OR type_mesures.type = "rouge" OR type_mesures.type = "bleu" OR type_mesures.type = "blanc" OR type_mesures.type = "vert"');
$reponse->execute(array($_GET["IDtest"]));

while($donnees = $reponse->fetch())
{
	$Tests[] = $donnees['type'];
	$Resultats[] = $donnees['valeur'];
}

//Nouveau graphique
$graph = new Graph(600, 500);    
$graph->SetScale('textlin');
$graph->img->SetMargin(80,20,20,80);
//Nouveau histogrammes
$bplot = new BarPlot($Moyenne);
$bplot->SetLegend('Moyenne des résultats');
$bplot->SetFillGradient('#a63c3c','#822f2f', GRAD_HOR,);
//Nouvelle courbe
$l1plot=new LinePlot($Resultats);
$l1plot->SetColor('black');
$l1plot->SetWeight(2);
$l1plot->SetLegend('Vos résultats');
//On ajoute les deux courbes
$graph->Add($bplot);
$graph->Add($l1plot);
 
$graph->title->Set('Placement dans la moyenne');
$graph->xaxis->title->Set('Tests');
$graph->yaxis->title->Set('Temps');
 
$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
 
$graph->xaxis->SetTickLabels($Tests);
$graph->xaxis->SetTitleMargin(15);
$graph->yaxis->SetTitleMargin(60);
$graph->Stroke();

?>
