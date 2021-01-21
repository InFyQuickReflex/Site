<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modifier le boitier</title>
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
        	include('../php_fr/fonctions/fonctions_permission.php');
            $donnees = PermissionAdmin($bdd);
			$req = selectBoitier($bdd,$_GET["ID"]);
            $donnees = $req->fetch();
		?>
        <br><br>
		<h2>Modifier le boitier</h2>
		<form method="POST" action="../php_fr/modifier_boitier.php">
		<label for="ID">ID : </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>
		<label for="numero">Numero du boitier : </label><input type="number" name="numero" id="numero" value="<?php echo $donnees['numero_boitier'] ?>"><br><br>
		<input type="submit" value="Valider" class=modifier onclick= 'Confirmation()';>
        <a href="gerer_capteurs.php" class=cancel>Retour aux capteurs</a>
		</form>
		<?php
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