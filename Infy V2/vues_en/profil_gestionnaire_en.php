<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - My profile</title>
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
            $donnees = PermissionGestion($bdd); ?>
            <br>
            <h2>Manager Profile</h2>

            <div class="profil">
                <img src="../img/pp.png">
                <p>
                    <?php
                        echo "<strong>Name</strong> : ".$donnees["prenom"]."<br>";
                        echo "<strong>Last Name</strong> : ".$donnees["nom"]."<br>";
                        echo "<strong>Username</strong> : ".$donnees["identifiant"]."<br>";
                        echo "<strong>Email</strong> : ".$donnees["email"]."<br><br>";
                    ?>
                    <a href="../controleur_en/deconnexion_en.php" class="button">Log Out</a>
                </p>
            </div>

            <br>
            <div class="create_user">
                <a href="creer_utilisateur.php">Add a new user</a>
            </div>

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
                    echo "<p>".$donnees["nom"]." ".$donnees["prenom"]." - ".$donnees["identifiant"]." <a href='edit-user-".$donnees["id_user"]."'>Edit</a><hr></p>";
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