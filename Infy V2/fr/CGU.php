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
      <?php include("header_footer/header.php")?>

    <main>
 	<br>
	<h1> Conditions Générales d'Utilisateur </h1>
	<div class=CGU>
	<?php

	include('../php_fr/connexionbdd.php');

	$req = $bdd->query("SELECT titre_fr, paragraphe_fr FROM CGU");
	while ($donnees = $req->fetch()){
		echo "<h3>".$donnees["titre"]."</h3>";
		echo "<p>".$donnees["paragraphe_fr"]."</p>";
	}
	?>
	</div>

	<br><br>

    </main>

      <?php include("header_footer/footer.php")?>
    </body>
</html>