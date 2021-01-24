<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Mon profil</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/profil_administrateur.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
    <?php include("header_footer/header.php")?>

    <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
        ?>
            <br>
            <h2>Profil Administrateur</h2>

            <div class="profil">
                <img src="../img/pp.png">
                <p>
                    <?php
                    include('../php_fr/connexionbdd.php');
                    include('../php_fr/fonctions/fonctions_permission.php');
                    $donnees = PermissionAdmin($bdd);

                        echo "<strong>Prénom</strong> : ".$donnees["prenom"]."<br>";
                        echo "<strong>Nom</strong> : ".$donnees["nom"]."<br>";
                        echo "<strong>Identifiant</strong> : ".$donnees["identifiant"]."<br>";
                        echo "<strong>Adresse email</strong> : ".$donnees["email"]."<br><br>";
                    ?>
                    <a href="../php_fr/deconnexion.php" class="button">Deconnexion</a>
                </p>
            </div>

            <br>
            <div class="button_container">
                <a href="gerer_capteurs.php">Gérer les capteurs</a>
                <a href="gerer_droits.php">Gérer les droits d'accès</a>
                <a href="gerer_faq.php">Gérer la FAQ</a>
                <a href="gerer_cgu.php"> Gérer les CGU</a>
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