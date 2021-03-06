<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Manage sensors</title>
		<link rel='stylesheet' href="../css/gerer_capteurs.css">
		<link rel="stylesheet" href="../css/header_footer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<script src='../css/popup.js'></script>
	</head>
	<body>
	<?php include("header_footer/header_en.php")?>
	<main>
	<br>
	<h1>Manage sensors</h1>
	<?php
    if(isset($_SESSION["ID"]))
    {
    	include('../controleur_fr/connexionbdd.php');
		include('../controleur_fr/fonctions/fonctions_gerer_capteurs.php');
		include('../controleur_fr/fonctions/fonctions_permission.php');
        PermissionAdmin($bdd);
    ?>
		<section id=NosCapteurs>
			<h2 class=TitreSection>Our sensors</h2>
			<div class='contenusection'>
				<?php
				$reqcapteurs = selectToutCapteur($bdd);
				if($reqcapteurs->rowCount() == 0)
				    {
					echo "No sensor found";
					}            
				else
				{
				while($donnees = $reqcapteurs->fetch())
				{
					$id_capteurs = $donnees['id_capteurs'];
					$numero_capteur	= $donnees['numero_capteur'];
					$id_boitier = $donnees['id_boitier'];
					$nom_type = $donnees['nom_type'];
					$unite_type = $donnees['unite_type'];
					
					echo "<article class=Capteur>
					<h2 class=TitreCapteur>Sensor n° ".$numero_capteur."</h2>
					ID : ".$id_capteurs
					."<br>Associated case (ID) : ".$id_boitier."<br>
					Type : ".$nom_type." (".$unite_type.") <br><br>
					<button id=SupCap".$id_capteurs." class=BoutonSupprimer>Delete</button>
					<a href='edit-sensor-".$id_capteurs."' class=BoutonModifier>Edit</a>
					</article>";
				}
				}
				$reqcapteurs->closeCursor();
				?>
			</div>
		</section>
		<section id=NosTypesCapteur>
			<h2 class=TitreSection>Our types of sensors</h2>
			<div class='contenusection'>
			<?php
			$reqtype = selectToutTypeCapteur($bdd);
			if($reqtype->rowCount() == 0)
	        {
				echo "No sensor found";
			}            
			else
			{
				while($donnees = $reqtype->fetch())
				{
					$id_type = $donnees['id_type'];
					$nom_type = $donnees['nom_type'];
					$unite_capteur = $donnees['unite_capteur'];
					echo "<article class=Capteur>
					<h2 class=TitreCapteur>".$nom_type."</h2>
					ID : ".$id_type.
					"<br>Unit of measurement : ".$unite_capteur."<br><br>
					<button id=SupTyp".$id_type." class=BoutonSupprimer>Delete</button>
					<a href='edit-type-".$id_type."' class=BoutonModifier>Edit</a>
					</article>";
				}
			}
			?>
			</div>
		</section>
		<section id=NosBoitiers>
			<h2 class=TitreSection>Our cases</h2>
			<div class='contenusection'>
			<?php
			$reqboitier = selectToutBoitier($bdd);
			if($reqboitier->rowCount() == 0)
	        {
				echo "No sensor found";
			}            
			else
			{
				while($donnees = $reqboitier->fetch())
				{
					$id_boitier = $donnees['id_boitier'];
					$numero_boitier = $donnees['numero_boitier'];
					echo "<article class=Capteur>
					<h2 class=TitreCapteur>Case n° ".$numero_boitier."</h2>
					ID : ".$id_boitier."<br><br>
					<button id=SupBoi".$id_boitier." class=BoutonSupprimer>Delete</button>
					<a href='edit-case-".$id_boitier."' class=BoutonModifier>Edit</a>
					</article>";
				}
			}
			?>
			</div>
		</section>
		<section id=AjouterCapteur>
			<h2 class=TitreSection>Add new sensor</h1>
			<div class='contenusection'>
			<form method='post' action='../controleur_en/ajouter_capteur_en.php' onsubmit="return valideFormEng()">
			<label for="numero">Sensor Number : </label>
			<input type="number" name="numero" id="numero" required><br><br>
			<label for="boitier">Case : </label>
			<select name='boitier' id='boitier' required>
			<?php $reqboitier = selectToutBoitier($bdd); 
			while($donnees_boitiers = $reqboitier->fetch())
			{
				echo "<option value = ".$donnees_boitiers['id_boitier'].">ID : ".
				$donnees_boitiers['id_boitier'].", n° : ".$donnees_boitiers['numero_boitier']."</option>";
			}
			$reqboitier->closeCursor();
			?>
			</select><br><br>
			<label for="type">Type : </label>
			<select name='type' id='type' required>
			<?php $reqtype = selectToutTypeCapteur($bdd); 
			while($donnees_types = $reqtype->fetch())
			{
				echo "<option value = ".$donnees_types['id_type'].">ID : ".$donnees_types['id_type'].
				", Name : ".$donnees_types['nom_type']." (".$donnees_types['unite_capteur'].")</option>";
			}
			$reqtype->closeCursor();
			?>
			</select><br><br>
			<input type="submit" value="Confirm">
			<input type="reset" value="Reset">
			</form>
			</div>
		</section>
		<section id=AjouterTypeCapteur>
			<h1 class=TitreSection>Add a new type of sensor</h1>
			<div class='contenusection'>
			<form method='post' action='../controleur_en/ajouter_type_capteur_en.php' onsubmit="return valideFormEng()">
			<label for="nom">Sensor Type Name : </label>
			<input type="text" name="nom" id="nom" required><br><br>
			<label for="unite">Sensor unit of measurement : </label>
			<input type="text" name="unite" id="unite" required><br><br>
			<input type="submit" value="Confirm">
			<input type="reset" value="Reset">
			</form>
			</div>
		</section>
		<section id=AjouterBoitier>
			<h1 class=TitreSection>Add new case</h1>
			<div class='contenusection'>
			<form method='post' action='../controleur_en/ajouter_boitier_en.php' onsubmit="return valideFormEng()">
			<label for="numero">Case number : </label>
			<input type="text" name="numero" id="numero" required><br><br>
			<input type="submit" value="Confirm">
			<input type="reset" value="Reset">
			</form>
			</div>
		</section>
	<?php
    }
    else
    {
        header("Location: menu_principal_en.php");
    }
    ?>
	</main>
	<?php include("header_footer/footer_en.php")?>
	</body>
	<script src='../css/gerer_capteurs_en.js'></script>
</html>
