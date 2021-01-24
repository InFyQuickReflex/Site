<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Modifier le capteur</title>
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
        	include('../controleur_fr/connexionbdd.php');
        	include('../controleur_fr/fonctions/fonctions_gerer_capteurs.php');
        	include('../controleur_fr/fonctions/fonctions_permission.php');
            $donnees = PermissionAdmin($bdd);
			$req = selectCapteur($bdd,$_GET['ID']);
            $donnees = $req->fetch();
		?>
		<br><br>
		<h2>Modifier le capteur</h2>
		<form method="POST" action="../controleur_fr/modifier_capteur.php" onsubmit="return valideForm()">
		<label for="ID">ID : </label>
		<input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>
		<label for="numero">Numero du Capteur : </label>
		<input type="number" name="numero" id="numero" value="<?php echo $donnees['numero_capteur'] ?>" required><br><br>
		<label for="boitier">Boitier : </label>
		<select name='boitier' id='boitier'>
		<?php $reqboitier = selectToutBoitier($bdd); 
		while($donnees_boitiers = $reqboitier->fetch())
		{
			if ($donnees_boitiers['id_boitier']==$donnees['id_boitier'])
			{
			echo "<option value = ".$donnees_boitiers['id_boitier']." selected>ID : ".$donnees_boitiers['id_boitier'].", n° : ".$donnees_boitiers['numero_boitier']."</option>";
			}
			else
			{
			echo "<option value = ".$donnees_boitiers['id_boitier'].">ID : ".$donnees_boitiers['id_boitier'].", n° : ".$donnees_boitiers['numero_boitier']."</option>";
			}
		}
		?>
		</select><br><br>
		<label for="type">Type : </label>
		<select name='type' id='type'>
		<?php $reqtype = selectToutTypeCapteur($bdd); 
		while($donnees_types = $reqtype->fetch())
		{
			if ($donnees_types['id_type']==$donnees['id_type'])
			{
			echo "<option value = ".$donnees_types['id_type']." selected>ID : ".$donnees_types['id_type'].", nom : ".$donnees_types['nom_type']." (".$donnees_types['unite_capteur'].")</option>";
			}
			else
			{
			echo "<option value = ".$donnees_types['id_type'].">ID : ".$donnees_types['id_type'].", nom : ".$donnees_types['nom_type']." (".$donnees_types['unite_capteur'].")</option>";
			}
		}
		?>
		</select>
		<br><br>
		<input type="submit" value="Valider" class=modifier>
        <a href="gerer_capteurs.php" class=cancel>Retour aux capteurs</a>
		</form>
		<?php
		  $req->closeCursor();
		  $reqtype->closeCursor();
		  $reqboitier->closeCursor();
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