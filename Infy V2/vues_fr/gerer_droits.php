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
            include('../controleur_fr/connexionbdd.php');
            include('../controleur_fr/fonctions/fonctions_permission.php');
            include('../controleur_fr/fonctions/fonctions_gerer_users.php');
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
                $reponse = RechercherUser($bdd);
                while($donnees = $reponse->fetch())
                {
                    echo "<p>".$donnees["nom"]." ".$donnees["prenom"]." - ".$donnees["identifiant"]." <a href='changer-permission-".$donnees["id_user"]."'>Modifier</a><hr></p>";
                }
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