<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titre</title>
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
	try
	{
		$bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
	}   
	catch (Exception $e)
	{
	    die("Erreur : " . $e->getMessage());
	}

	$req = $bdd->query("SELECT titre, paragraphe FROM CGU");
	while ($donnees = $req->fetch()){
		echo "<h3>".$donnees["titre"]."</h3>";
		echo "<p>".$donnees["paragraphe"]."</p>";
	}
	?>
	</div>
    </main>

      <?php include("header_footer/footer.php")?>
    </body>
</html>