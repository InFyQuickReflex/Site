<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: ../fr/menu_principal_fr.php");
exit(); }
?>
