<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Manage General User Conditions</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/gerer_cgu.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

    <main>
 	
	<?php
    if(isset($_SESSION["ID"]))
    {

	include('../controleur_fr/connexionbdd.php');
    include('../controleur_fr/fonctions/fonctions_cgu.php');
    include('../controleur_fr/fonctions/fonctions_permission.php');
    PermissionAdmin($bdd);
	?>
	<br>
	<h1> General User Conditions </h1>
	<div class=CGU>
        
	<?php
	$reqcgu = SelectCgu($bdd);
	while ($donnees = $reqcgu->fetch()){
	   echo "<h3>".$donnees["titre_en"]."</h3><p> ".$donnees["paragraphe_en"]." </p><a href='Legal-notice-".$donnees["id_CGU"]."'>Edit</a></p>";
	}
    $reqcgu->closeCursor();
	?>
	</div>

	<br>
    <div class="gerer">
        <a href="creer_cgu_en.php" name = "action" value="Add"> Add a new paragraph</a>
    </div>

    </main>

      <?php
      } 
      include("header_footer/footer_en.php")?>
    </body>
</html>