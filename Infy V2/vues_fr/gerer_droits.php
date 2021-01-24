<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Droits d'accès</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/profil_gestionnaire.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header.php")?>

        <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
            include('../php_fr/connexionbdd.php');
            include('../php_fr/fonctions/fonctions_permission.php');
            PermissionAdmin($bdd);
            ?>                   
            <br>
            <h2>Droits d'accès</h2>
            <br>
            <form method="$_GET">
                <input type="search" placeholder="Chercher un utilisateur" name ="recherche" required>
                <input type="submit" value="Rechercher">
            </form>
            <br>
            <div class="result">
                <?php
                include('../php_fr/connexionbdd.php');

                if(isset($_GET["recherche"]))
                {
                    $recherche = htmlspecialchars($_GET["recherche"]);
                    $recherche=str_replace(' ','',$recherche);

                    $reponse = $bdd->prepare("SELECT id_user, prenom, nom, identifiant, permission FROM users WHERE CONCAT(prenom, nom, identifiant) LIKE ? ORDER BY nom");
                    $reponse->execute(array("%".$recherche."%"));

                    if($reponse->rowCount() == 0)
                    {
                        echo "Aucun utilisateur trouvé";
                    }
                }

                else
                {
                    $reponse = $bdd->query("SELECT id_user, prenom, nom, identifiant, permission FROM users ORDER BY nom");
                }

                while($donnees = $reponse->fetch())
                {
                    echo "<p>".$donnees["nom"]." ".$donnees["prenom"]." - ".$donnees["identifiant"]." - ".$donnees["permission"]."<a href='changer-permission-".$donnees["id_user"]."'>Modifier</a><hr></p>";
                }

                $reponse->closeCursor();
                ?>
            </div>

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