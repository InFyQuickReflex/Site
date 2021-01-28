<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Gérer la FAQ</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/gerer_cgu.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
 
    <body>
      <?php include("header_footer/header.php")?>

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
	$req = SelectFaq($bdd);
    if($req->rowCount() == 0)
    {
        echo "Aucun texte";
    }            
    else
    {
        while ($donnees = $req->fetch()){
           echo "<h3>".$donnees["question_fr"]."</h3><p> ".$donnees["reponse_fr"]." </p><a href='FAQ-".$donnees["id_FAQ"]."'>Modifier</a></p>";
        }
    }
    $reqfaq->closeCursor();
	?>
	</div>

	<br>
    <div class="gerer">
        <a href="creer_faq.php" name = "action" value="ajouter"> Ajouter une question</a>
    </div>

    </main>

      <?php
      } 
      include("header_footer/footer.php")?>
    </body>
</html>