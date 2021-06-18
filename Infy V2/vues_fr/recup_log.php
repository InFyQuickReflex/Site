<?php
include('../controleur_fr/connexionbdd.php');

$ch = curl_init();
$data = file_get_contents('http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G5CA'); 
//echo "Raw Data:<br />";
//echo("$data");

$data_tab = str_split($data,33);
//echo "Tabular Data:<br />";

$size=count($data_tab);
for($i=0;  $i<$size; $i++){
echo "Trame $i: $data_tab[$i]<br />";
}

echo "Taille: $size";
$trame = $data_tab[$size-2];

list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
$vConverti = $v/100;
$date = "$year/$month/$day";
$datehoraire = "$hour:$min:$sec"; 
echo("<br />$t,$o,$r,$c,$n,$vConverti,$a,$x,$date,$datehoraire<br />");


$req = $bdd->prepare("INSERT INTO mesures(date_mesure,valeur, unite_mesure, id_capteurs, id_type_mesures) VALUES(?,?,?,?,?)");
$req->execute(array($datehoraire, $vConverti, "degré", $c,"1"));

$req2 = $bdd->prepare("INSERT INTO tests(date_test) VALUES(?)");
$req2->execute(array($date));
?>