<?php
session_start();
session_destroy();
header("Location: ../vues_en/menu_principal_en.php");
?>