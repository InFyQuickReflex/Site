<?php
include('../connexionbdd.php');
include('../fonctions/fonctions_gerer_capteurs.php');
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