<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit the box</title>
        <link rel="stylesheet" href="../css/header_footer.css">
		<link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src = "../css/popup.js"></script>
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

      <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
        	include('../php_fr/connexionbdd.php');
        	include('../php_fr/fonctions/fonctions_gerer_capteurs.php');
        	include('../php_fr/fonctions/fonctions_permission.php');
            PermissionAdmin($bdd);
			$req = selectBoitier($bdd,$_GET["ID"]);
            $donnees = $req->fetch();
		?>
        <br><br>
		<h2>Edit a case</h2>
		<form method="POST" action="../controleur_en/modifier_boitier_en.php" onsubmit="return valideForm()">
		<label for="ID">ID : </label>
        <input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>
		<label for="numero">Case number : </label>
        <input type="number" name="numero" id="numero" value="<?php echo $donnees['numero_boitier'] ?>" required><br><br>
		<input type="submit" value="Submit" class=modifier>
        <a href="gerer_capteurs_en.php" class=cancel>Back to sensors</a>
		</form>
		<?php
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