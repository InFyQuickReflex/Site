<?php
session_start();
session_destroy();
header("Location: ../fr/menu_principal.php");
?>