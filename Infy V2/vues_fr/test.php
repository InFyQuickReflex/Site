<form method="$_GET">
    <input type="search" placeholder="Chercher un utilisateur" name ="recherche" required>
    <input type="submit" value="Rechercher">
</form>

<?php
try
{
    $bdd = new PDO("mysql:host=localhost;dbname=infy;charset=utf8", "root", "root");
}

catch (Exception $e)
{
    die("Erreur : " . $e->getMessage());
}


if(isset($_GET["recherche"]))
{
    $recherche = htmlspecialchars($_GET["recherche"]);
    $recherche=str_replace(' ','',$recherche);

    $reponse = $bdd->prepare("SELECT prenom, nom, identifiant FROM users WHERE CONCAT(prenom, nom, identifiant) LIKE ?");
    $reponse->execute(array("%".$recherche."%"));

    if($reponse->rowCount() == 0)
    {
        echo "Aucun utilisateur trouvé";
    }
}

else
{
    $reponse = $bdd->query("SELECT prenom, nom, identifiant FROM users");
}

while($donnees = $reponse->fetch())
{
    echo $donnees["prenom"]." ".$donnees["nom"]." - ".$donnees["identifiant"]."<br>";
}

$reponse->closeCursor();

?>