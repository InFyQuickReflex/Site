<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modifier le type de capteur</title>
        <link rel="stylesheet" href="../css/header_footer.css">
		<link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src = "../css/popup.js"></script>
    </head>

    <body>
      <?php include("header_footer/header.php")?>

      <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
        	include('../php_fr/connexionbdd.php');
        	include('../php_fr/fonctions/fonctions_gerer_capteurs.php');
        	$permission = permissionUser($bdd,$_SESSION["ID"]);

        if($permission != "administrateur")
		{
			if($permission == "gestionnaire")
                {
					header("Location: profil_gestionnaire.php");
				}
			else if($permission == "utilisateur")
			{
				header("Location: profil_utilisateur.php");
			}
		}
			else
			{
			$req = selectTypeCapteur($bdd,$_GET["ID"]);
            $donnees = $req->fetch();
		?>
        <br><br>
		<h2>Modifier le type de capteur</h2>
		<form method="POST" action="../php_fr/modifier_type_capteur.php">
		<label for="ID">ID : </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>
		<label for="nom">Nom du type : </label><input type="text" name="nom" id="nom" value="<?php echo $donnees['nom_type'] ?>"><br><br>
		<label for="unite">Unité de mesure : </label><input type="text" name="unite" id="unite" value="<?php echo $donnees['unite_capteur'] ?>"><br><br>
		<input type="submit" value="Valider" class=modifier onclick= 'Confirmation()';>
        <a href="gerer_capteurs.php" class=cancel>Retour aux capteurs</a>
		</form>
		<?php
		  }
		  $req->closeCursor();
        }
		else
        {
		  header("Location: menu_principal.php");
        }
        ?>
      </main>

      <?php include("header_footer/footer.php")?>
    </body>
</html>