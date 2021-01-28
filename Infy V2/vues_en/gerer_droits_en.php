<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Manage access rights</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/profil_gestionnaire.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

        <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
            include('../controleur_fr/connexionbdd.php');
            include('../controleur_fr/fonctions/fonctions_permission.php');
            PermissionAdmin($bdd);
            ?>                   
            <br>
            <h2>Droits d'accès</h2>
            <br>
            <form method="$_GET">
                <input type="search" placeholder="Find a user" name ="Search" required>
                <input type="submit" value="Find">
            </form>
            <br>
            <div class="result">
                <?php
                include('../controleur_fr/connexionbdd.php');

                if(isset($_GET["recherche"]))
                {
                    $recherche = htmlspecialchars($_GET["recherche"]);
                    $recherche=str_replace(' ','',$recherche);

                    $reponse = $bdd->prepare("SELECT id_user, prenom, nom, identifiant, permission FROM users WHERE CONCAT(prenom, nom, identifiant) LIKE ? ORDER BY nom");
                    $reponse->execute(array("%".$recherche."%"));

                    if($reponse->rowCount() == 0)
                    {
                        echo "No user found";
                    }
                }

                else
                {
                    $reponse = $bdd->query("SELECT id_user, prenom, nom, identifiant, permission FROM users ORDER BY nom");
                }

                while($donnees = $reponse->fetch())
                {
                    echo "<p>".$donnees["nom"]." ".$donnees["prenom"]." - ".$donnees["identifiant"]." - ".$donnees["permission"]."<a href='change-access-".$donnees["id_user"]."'>Edit</a><hr></p>";
                }

                $reponse->closeCursor();
                ?>
            </div>

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
</html>