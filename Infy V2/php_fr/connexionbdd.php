<?php
try
{
	$bdd = new PDO("mysql:host= mysql-infy.alwaysdata.net;dbname=infy_QR;charset=utf8", "infy", "g5cappbdd");
}
catch (Exception $e)
{
	die("Erreur : " . $e->getMessage());
}
?>
