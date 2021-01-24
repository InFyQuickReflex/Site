<?php
include('../connexionbdd.php');
include('../fonctions/fonctions_gerer_capteurs.php');
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
		<h2 class=TitreCapteur>Case n° ".$numero_boitier."</h2>
		ID : ".$id_boitier."<br><br>
		<button id=SupBoi".$id_boitier." class=BoutonSupprimer>Delete</button>
		<a href='modifier_boitier_page_en.php?ID=".$id_boitier."' class=BoutonModifier>Edit</a>
		</article>";
	}
}
?>