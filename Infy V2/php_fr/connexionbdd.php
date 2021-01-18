<?php
try
{
	$bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "g5cappbdd");
}
catch (Exception $e)
{
	die("Erreur : " . $e->getMessage());
}
?>
