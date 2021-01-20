<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit the box</title>
        <link rel="stylesheet" href="../css/header_footer.css">
		<link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

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
					header("Location: profil_gestionnaire_en.php");
				}
			else if($permission == "utilisateur")
			{
				header("Location: profil_utilisateur_en.php");
			}
		}
			else
			{
			$req = selectBoitier($bdd,$_GET["ID"]);
            $donnees = $req->fetch();
		?>
        <br><br>
		<h2>Edit a case</h2>
		<form method="POST" action="../php_en/modifier_boitier_en.php">
		<label for="ID">ID : </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>
		<label for="numero">Case number : </label><input type="number" name="numero" id="numero" value="<?php echo $donnees['numero_boitier'] ?>"><br><br>
		<input type="submit" value="Valider" class=modifier>
        <a href="gerer_capteurs.php" class=cancel>Back to sensors</a>
		</form>
		<?php
		  }
		  $req->closeCursor();
        }
		else
        {
		  header("Location: menu_principal_en.php");
        }
        ?>
      </main>

      <?php include("header_footer/footer_en.php")?>
    </body>
</html>