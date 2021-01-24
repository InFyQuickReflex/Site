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
    <?php include("header_footer/header_en.php")?>

    <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
            ?>
            <br>
            <h2>Administrator Profile</h2>

            <div class="profil">
                <img src="../img/pp.png">
                <p>
                    <?php
                    include('../php_fr/connexionbdd.php');
                    include('../php_fr/fonctions/fonctions_permission.php');
                    $donnees = PermissionAdmin($bdd);
                        echo "<strong>Name</strong> : ".$donnees["prenom"]."<br>";
                        echo "<strong>Surname</strong> : ".$donnees["nom"]."<br>";
                        echo "<strong>Username</strong> : ".$donnees["identifiant"]."<br>";
                        echo "<strong>Email address</strong> : ".$donnees["email"]."<br><br>";
                    $req->closeCursor();
                    ?>
                    <a href="../php_fr/deconnexion.php" class="button">Logout</a>
                </p>
            </div>

            <br>
            <div class="button_container">
                <a href="gerer_capteurs_en.php">Manage sensors</a>
                <a href="gerer_droits_en.php">Manage access rights</a>
                <a href="gerer_faq_en.php">Manage FAQ</a>
                <a href="gerer_cgu_en.php"> Manage legal notices </a>
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