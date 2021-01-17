<?php
include('../connexionbdd.php');
include('../fonctions/fonctions_gerer_capteurs.php');
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