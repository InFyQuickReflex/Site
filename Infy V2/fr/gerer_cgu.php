<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Gérer les CGU</title>
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

	include('../php_fr/connexionbdd.php');
    include('../php_fr/fonctions/fonctions_cgu.php');
    
    $req = $bdd->prepare("SELECT prenom, nom, identifiant, email, permission FROM users WHERE id_user = ?");
    $req->execute(array($_SESSION["ID"]));
    $donnees = $req->fetch();

    if($donnees["permission"] != "administrateur")
    {
        if($donnees["permission"] == "gestionnaire")
        {
        header("Location: profil_gestionnaire.php");
        }

        else if($donnees["permission"] == "utilisateur")
        {
            header("Location: profil_utilisateur.php");
        }
    }
	?>
	<br>
	<h1> Conditions Générales d'Utilisateur </h1>
	<div class=CGU>
        
	<?php
	$reqcgu = SelectCgu($bdd);
	while ($donnees = $reqcgu->fetch()){
	   echo "<h3>".$donnees["titre_fr"]."</h3><p> ".$donnees["paragraphe_fr"]." </p><a href='modifier_cgu.php?ID=".$donnees["id_CGU"]."'>Modifier</a></p>";
	}
    $reqcgu->closeCursor();
	?>
	</div>

	<br>
    <div class="gerer">
        <a href="creer_cgu.php" name = "action" value="ajouter"> Ajouter un nouveau paragraphe</a>
    </div>

    </main>

      <?php
      } 
      include("header_footer/footer.php")?>
    </body>
</html>