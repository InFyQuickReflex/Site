<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modifier le capteur</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header.php")?>

      <main>
        <?php
		if(isset($_SESSION["ID"]))
        {
          try
          {
              $bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
          }

          catch (Exception $e)
          {
              die("Erreur : " . $e->getMessage());
          }

          $req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
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
		  else
		  {
			  $req = $bdd->prepare("SELECT * FROM capteurs WHERE id_capteurs = ?");
              $req->execute(array($_GET["ID"]));
              $donnees = $req->fetch();
		?>
		<h2>Modifier le capteur</h2>
		<form method="POST" action="../php_fr/modifier_capteur.php">
		<label for="ID">ID : </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>
		<label for="numero">Numero du Capteur : </label><input type="number" name="numero" id="numero" value="<?php echo $donnees['numero_capteur'] ?>"><br><br>
		<label for="boitier">Boitier : </label>
		<select name='boitier' id='boitier'>
		<?php $reqboitier = $bdd->query('SELECT * FROM boitiers'); 
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
		<?php $reqtype = $bdd->query('SELECT * FROM type_capteurs'); 
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
		<input type="submit" value="Valider">
        <a href="gerer_capteurs.php">Retour aux capteurs</a>
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