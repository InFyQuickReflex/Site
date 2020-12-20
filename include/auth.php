<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: ../MenuPrincipal.php");
exit(); }
?>
