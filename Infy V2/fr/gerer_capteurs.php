<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Gérer les capteurs</title>
		<link rel='stylesheet' href="../css/gerer_capteurs.css">
		<link rel="stylesheet" href="../css/header_footer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	</head>
	<body>
	<?php include("header_footer/header.php")?>
	<main>
	<br>
	<h1>Gérer les capteurs</h1>
	<?php
    if(isset($_SESSION["ID"]))
    {
    	include('../php_fr/connexionbdd.php');
		include('../php_fr/fonctions/fonctions_gerer_capteurs.php');
		include('../php_fr/fonctions/fonctions_permission.php');
        PermissionAdmin($bdd);
    ?>
		<section id=NosCapteurs>
			<h2 class=TitreSection>Nos capteurs</h2>

			<div class='contenusection'>
				<?php
				$reqcapteurs = selectToutCapteur($bdd);
				if($reqcapteurs->rowCount() == 0)
				    {
					echo "Aucun capteur trouvé";
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
					<h2 class=TitreCapteur>Capteur n° ".$numero_capteur."</h2>
					ID : ".$id_capteurs
					."<br>Boîtier associé (ID) : ".$id_boitier."<br>
					Type : ".$nom_type." (".$unite_type.") <br><br>
					<button id=SupCap".$id_capteurs." class=BoutonSupprimer>Supprimer</button>
					<a href='modifier_capteur_page.php?ID=".$id_capteurs."' class=BoutonModifier>Modifier</a>
					</article>";
				}
				}
				$reqcapteurs->closeCursor();
				?>
			</div>
		</section>
		<section id=NosTypesCapteur>
			<h2 class=TitreSection>Nos types de capteurs</h2>
			<div class='contenusection'>
			<?php
			$reqtype = selectToutTypeCapteur($bdd);
			if($reqtype->rowCount() == 0)
	        {
				echo "Aucun capteur trouvé";
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
					"<br>Unité de mesure : ".$unite_capteur."<br><br>
					<button id=SupTyp".$id_type." class=BoutonSupprimer>Supprimer</button>
					<a href='modifier_type_capteur_page.php?ID=".$id_type."' class=BoutonModifier>Modifier</a>
					</article>";
				}
			}
			?>
			</div>
		</section>
		<section id=NosBoitiers>
			<h2 class=TitreSection>Nos boîtiers</h2>
			<div class='contenusection'>
			<?php
			$reqboitier = selectToutBoitier($bdd);
			if($reqboitier->rowCount() == 0)
	        {
				echo "Aucun boitier trouvé";
			}            
			else
			{
				while($donnees = $reqboitier->fetch())
				{
					$id_boitier = $donnees['id_boitier'];
					$numero_boitier = $donnees['numero_boitier'];
					echo "<article class=Capteur>
					<h2 class=TitreCapteur>Boitier n° ".$numero_boitier."</h2>
					ID : ".$id_boitier."<br><br>
					<button id=SupBoi".$id_boitier." class=BoutonSupprimer>Supprimer</button>
					<a href='modifier_boitier_page.php?ID=".$id_boitier."' class=BoutonModifier>Modifier</a>
					</article>";
				}
			}
			?>
			</div>
		</section>
		<section id=AjouterCapteur>
			<h2 class=TitreSection>Ajouter un nouveau capteur</h1>
			<div class='contenusection'>
			<form method='post' action='../php_fr/ajouter_capteur.php'>
			<label for="numero">Numero du Capteur : </label>
			<input type="number" name="numero" id="numero"><br><br>
			<label for="boitier">Boitier : </label>
			<select name='boitier' id='boitier'>
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
			<select name='type' id='type'>
			<?php $reqtype = selectToutTypeCapteur($bdd); 
			while($donnees_types = $reqtype->fetch())
			{
				echo "<option value = ".$donnees_types['id_type'].">ID : ".$donnees_types['id_type'].
				", nom : ".$donnees_types['nom_type']." (".$donnees_types['unite_capteur'].")</option>";
			}
			$reqtype->closeCursor();
			?>
			</select><br><br>
			<input type="submit" value="Envoyer">
			<input type="reset" value="Reset">
			</form>
			</div>
		</section>
		<section id=AjouterTypeCapteur>
			<h1 class=TitreSection>Ajouter un nouveau type de capteur</h1>
			<div class='contenusection'>
			<form method='post' action='../php_fr/ajouter_type_capteur.php'>
			<label for="nom">Nom du type de capteur : </label>
			<input type="text" name="nom" id="nom"><br><br>
			<label for="unite">Unité de mesure du capteur : </label>
			<input type="text" name="unite" id="unite"><br><br>
			<input type="submit" value="Envoyer">
			<input type="reset" value="Reset">
			</form>
			</div>
		</section>
		<section id=AjouterBoitier>
			<h1 class=TitreSection>Ajouter un nouveau boitier</h1>
			<div class='contenusection'>
			<form method='post' action='../php_fr/ajouter_boitier.php'>
			<label for="numero">Numero du boitier : </label>
			<input type="text" name="numero" id="numero"><br><br>
			<input type="submit" value="Envoyer">
			<input type="reset" value="Reset">
			</form>
			</div>
		</section>
	<?php
    }
    else
    {
        header("Location: menu_principal.php");
    }
    ?>
	</main>
	<?php include("header_footer/footer.php")?>
	</body>
	<script src='../css/gerer_capteurs.js'></script>
</html>
