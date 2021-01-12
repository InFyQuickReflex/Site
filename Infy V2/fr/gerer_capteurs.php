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
	<?php
    if(isset($_SESSION["ID"]))
    {
    ?>
		<div id=NosCapteurs>
			<h2 class=TitreSection>Nos Capteurs</h2>
		<?php
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
			$req->closeCursor();
            $reqcapteurs = $bdd->query("SELECT id_capteurs, numero_capteur, nom_type, unite_capteur AS unite_type,id_boitier
			FROM capteurs INNER JOIN type_capteurs
			ON capteurs.id_type = type_capteurs.id_type
			ORDER BY capteurs.id_capteurs");
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
				<a href='../php_fr/supprimer_capteur.php?ID=".$id_capteurs."' class=BoutonSupprimer>Supprimer</a>
				<a href='modifier_capteur_page.php?ID=".$id_capteurs."' class=BoutonModifier>Modifier</a>
				</article>";
			}
			}
			$reqcapteurs->closeCursor();
			
		?>
		
		</div>
		<div id=NosTypesCapteur>
		<h2 class=TitreSection>Nos types de capteurs</h2>
		<?php
		$reqtype = $bdd->query('SELECT * FROM type_capteurs');
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
				<a href='../php_fr/supprimer_type_capteur.php?ID=".$id_type."' class=BoutonSupprimer>Supprimer</a>
				<a href='modifier_type_capteur_page.php?ID=".$id_type."' class=BoutonModifier>Modifier</a>
				</article>";
			}
		}
		?>
		
		</div>
		<section id=AjouterCapteur>
			<h1 class=TitreSection>Ajouter un nouveau capteur</h1>
			<form method='post' action='../php_fr/ajouter_capteur.php'>
			<label for="numero">Numero du Capteur : </label><input type="number" name="numero" id="numero"><br><br>
			<label for="boitier">Boitier : </label>
			<select name='boitier' id='boitier'>
			<?php $reqboitier = $bdd->query('SELECT * FROM boitiers'); 
			while($donnees_boitiers = $reqboitier->fetch())
			{
				echo "<option value = ".$donnees_boitiers['id_boitier'].">ID : ".$donnees_boitiers['id_boitier'].", n° : ".$donnees_boitiers['numero_boitier']."</option>";
			}
			$reqboitier->closeCursor();
			?>
			</select><br><br>
			<label for="type">Type : </label>
			<select name='type' id='type'>
			<?php $reqtype = $bdd->query('SELECT * FROM type_capteurs'); 
			while($donnees_types = $reqtype->fetch())
			{
				echo "<option value = ".$donnees_types['id_type'].">ID : ".$donnees_types['id_type'].", nom : ".$donnees_types['nom_type']." (".$donnees_types['unite_capteur'].")</option>";
			}
			$reqtype->closeCursor();
			?>
			</select><br><br>
			<input type="submit" value="Envoyer">
			<input type="reset" value="Reset">
			</form>
		</section>
		<section id=AjouterTypeCapteur>
		<h1 class=TitreSection>Ajouter un nouveau type de capteur</h1>
		<form method='post' action='../php_fr/ajouter_type_capteur.php'>
		<label for="nom">Nom du type de capteur : </label><input type="text" name="nom" id="nom"><br><br>
		<label for="unite">Unité de mesure du capteur : </label><input type="text" name="unite" id="unite"><br><br>
		<input type="submit" value="Envoyer">
		<input type="reset" value="Reset">
		</form>
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
</html>
