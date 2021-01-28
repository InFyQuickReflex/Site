<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Manage FAQ</title>
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
    include('../controleur_fr/fonctions/fonctions_faq.php');
    include('../controleur_fr/fonctions/fonctions_permission.php');
    $donnees = PermissionAdmin($bdd);
	?>
	<br>
	<h1> FAQ </h1>
	<div class=CGU>
        
	<?php
	$reqfaq = SelectFaq($bdd);
    if($reqfaq->rowCount() == 0)
    {
        echo "Nothing";
    }            
    else
    {
	    while ($donnees = $reqfaq->fetch()){
	       echo "<h3>".$donnees["question_en"]."</h3><p> ".$donnees["reponse_en"]." </p><a href='FAQ-".$donnees["id_FAQ"]."'>Edit</a></p>";
	    }
    }
    $reqfaq->closeCursor();
	?>
	</div>

	<br>
    <div class="gerer">
        <a href="creer_faq_en.php" name = "action" value="Add"> Add a question</a>
    </div>

    </main>

      <?php
      } 
      include("header_footer/footer_en.php")?>
    </body>
</html>