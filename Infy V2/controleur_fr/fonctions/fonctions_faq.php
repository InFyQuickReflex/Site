<?php
function SelectFaqUser($bdd){
	$req = $bdd->prepare("SELECT * FROM FAQ");
	$req->execute();
	while($donnees = $req->fetch())
    {
        echo '<button class="accordion">
        <h3>'.$donnees['question_fr'].'</h3>
        </button>
        <div class="panel">'   
        .$donnees['reponse_fr'].'</div>';
	}
}

function SelectFaq($bdd){
	$req = $bdd->prepare("SELECT * FROM FAQ");
	$req->execute();
	if($req->rowCount() == 0)
    {
        echo "Aucun texte";
    }            
    else
    {
	    while ($donnees = $req->fetch()){
	       echo "<h3>".$donnees["question_fr"]."</h3><p> ".$donnees["reponse_fr"]." </p><a href='FAQ-".$donnees["id_FAQ"]."'>Modifier</a></p>";
	    }
    }
	return $req;
}

function CreateFaq($bdd, $titre, $paragraphe){
	$req = $bdd->prepare("INSERT INTO FAQ(question_fr,reponse_fr) VALUES(?, ?)");
	$req->execute(array($titre, $paragraphe));
	return $req;
}

function SelectOneFaq($bdd,$ID){
	$req = $bdd->prepare("SELECT * FROM FAQ WHERE id_FAQ = ?");
    $req->execute(array($ID));
    $rep = $req->fetch();
    return $rep;
}

function EditFaq($bdd, $ID, $titre_fr, $paragraphe_fr, $titre_en, $paragraphe_en){
	$req = $bdd->prepare("UPDATE FAQ SET question_fr = ?, reponse_fr = ?, question_en = ?, reponse_en = ?  WHERE id_FAQ = ?");
	$req->execute(array($titre_fr, $paragraphe_fr, $titre_en, $paragraphe_en, $ID));
	return $req;
}

function DeleteFaq($bdd,$ID){
	$req = $bdd->prepare("DELETE FROM FAQ WHERE id_FAQ = ?");
	$req->execute(array($ID));
	return $req;
}

