<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Edit the sensor</title>
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
			$req = selectCapteur($bdd,$_GET['ID']);
            $donnees = $req->fetch();
		?>
		<br><br>
		<h2>Edit the sensor</h2>
		<form method="POST" action="../php_en/modifier_capteur_en.php">
		<label for="ID">ID : </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>
		<label for="numero">Sensor n° : </label><input type="number" name="numero" id="numero" value="<?php echo $donnees['numero_capteur'] ?>"><br><br>
		<label for="boitier">Associated case : </label>
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
			echo "<option value = ".$donnees_types['id_type']." selected>ID : ".$donnees_types['id_type'].", name : ".$donnees_types['nom_type']." (".$donnees_types['unite_capteur'].")</option>";
			}
			else
			{
			echo "<option value = ".$donnees_types['id_type'].">ID : ".$donnees_types['id_type'].", name : ".$donnees_types['nom_type']." (".$donnees_types['unite_capteur'].")</option>";
			}
		}
		?>
		</select>
		<br><br>
		<input type="submit" value="Submit" class=modifier onclick= 'ConfirmationEng()';>
        <a href="gerer_capteurs_en.php" class=cancel>Back to sensors</a>
		</form>
		<?php
		  $req->closeCursor();
		  $reqtype->closeCursor();
		  $reqboitier->closeCursor();
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