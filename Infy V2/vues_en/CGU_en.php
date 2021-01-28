<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Conditions Générales d'Utilisateur</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/CGU.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

    <main>
 	<br>
	<h1> General User Conditions </h1>
	<div class=CGU>
	<?php

	include('../controleur_fr/connexionbdd.php');
    include('../controleur_fr/fonctions/fonctions_cgu.php');
    $reqcgu = SelectCguUser($bdd);
    while ($donnees = $reqcgu->fetch()){
       echo "<h3>".$donnees["titre_en"]."</h3><p> ".$donnees["paragraphe_en"]." </p>";
    }
    $reqcgu->closeCursor();
	?>
	</div>

	<br><br>

    </main>

      <?php include("header_footer/footer_en.php")?>
    </body>
</html>