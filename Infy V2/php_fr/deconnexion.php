<?php
session_start();
session_destroy();
header("Location: ../vues_fr/menu_principal.php");
?>