<?php
$ch = curl_init();
$data = file_get_contents('http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G5CA'); 
echo "Raw Data:<br />";
echo("$data");

$data_tab = str_split($data,33);
echo "Tabular Data:<br />";
for($i=0, $size=count($data_tab); $i<$size; $i++){
//echo "Trame $i: $data_tab[$i]<br />";
$trame = $data_tab[$i];

list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
$vhexa = hexdec($v);
echo("<br />$t,$o,$r,$c,$n,$vhexa,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
}
/*
$trame = $data_tab[1];

list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
$vhexa = hexdec($v);
echo("<br />$t,$o,$r,$c,$n,$vhexa,$a,$x,$year,$month,$day,$hour,$min,$sec<br />");
*/
?>