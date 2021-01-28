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
            include('../controleur_fr/fonctions/fonctions_gerer_users.php');
            PermissionAdmin($bdd);
            ?>                   
            <br>
            <h2>Access Rights</h2>
            <br>
            <form method="$_GET">
                <input type="search" placeholder="Find a user" name ="recherche" required>
                <input type="submit" value="Search">
            </form>
            <br>
            <div class="result">
                <?php
                $reponse = RechercherUser($bdd);
                while($donnees = $reponse->fetch())
                {
                    echo "<p>".$donnees["nom"]." ".$donnees["prenom"]." - ".$donnees["identifiant"]." <a href='change-access-".$donnees["id_user"]."'>Edit</a><hr></p>";
                }
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