<?php
if(isset($_SESSION["ID"]))
{
    echo "<h2>Vos Résultats</h2>";

    include('../php_fr/connexionbdd.php');

    $req = $bdd->prepare("SELECT prenom, nom, identifiant, email, permission FROM users WHERE id_user = ?");
    $req->execute(array($_SESSION["ID"]));
    $donnees = $req->fetch();
	if($donnees["permission"] != "utilisateur")
    {
        if($donnees["permission"] == "administrateur")
        {
            header("Location: profil_administrateur.php");
        }
        else if($donnees["permission"] == "gestionnaire")
        {
            header("Location: profil_gestionnaire.php");
        }   
    }
    else
    {

		//$tableauElement = array();
		//$tableauTemps = array();

		$reponse= $bdd->prepare('SELECT type FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "rouge" OR type = "bleu" OR type = "blanc" OR type = "vert"');
		$reponse->execute(array($_GET["IDtest"]));
		while($donnees = array($reponse->fetch()))
		{
			echo"type:".$donnees['type'];
		}
	}
}
else
{
	echo"why";
}