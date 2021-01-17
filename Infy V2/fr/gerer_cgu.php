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
	try
	{
		$bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
	}   
	catch (Exception $e)
	{
	    die("Erreur : " . $e->getMessage());
	}

	$req = $bdd->query("SELECT id_CGU,titre, paragraphe FROM CGU");
	while ($donnees = $req->fetch()){
		echo "<h3>".$donnees["titre"]."</h3><p> ".$donnees["paragraphe"]." </p><a href='modifier_cgu.php?ID=".$donnees["id_CGU"]."'>Modifier</a></p>";
	}
    $req->closeCursor();
	?>
	</div>

	<br>
    <div class="gerer">
        <a href="creer_cgu.php"> Ajouter un nouveau paragraphe</a>
    </div>

    </main>

      <?php
      } 
      include("header_footer/footer.php")?>
    </body>
</html>