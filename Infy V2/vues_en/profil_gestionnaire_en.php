<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Mon profil</title>
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
                        echo "<strong>First name</strong> : ".$donnees["prenom"]."<br>";
                        echo "<strong>Name</strong> : ".$donnees["nom"]."<br>";
                        echo "<strong>Username</strong> : ".$donnees["identifiant"]."<br>";
                        echo "<strong>Email</strong> : ".$donnees["email"]."<br><br>";
                    $req->closeCursor();
                    ?>
                    <a href="../controleur_fr/deconnexion.php" class="button">Log out</a>
                </p>
            </div>

            <br>
            <div class="create_user">
                <a href="creer_utilisateur.php">Create new user(s)</a>
            </div>

            <br>
            <form method="$_GET">
                <input type="search" placeholder="Search an user" name ="recherche" required>
                <input type="submit" value="Research">
            </form>

            <br>
            <div class="result">
                
                <?php

                if(isset($_GET["recherche"]))
                {
                    $recherche = htmlspecialchars($_GET["recherche"]);
                    $recherche=str_replace(' ','',$recherche);

                    $reponse = $bdd->prepare("SELECT id_user, prenom, nom, identifiant FROM users WHERE CONCAT(prenom, nom, identifiant) LIKE ? ORDER BY nom");
                    $reponse->execute(array("%".$recherche."%"));

                    if($reponse->rowCount() == 0)
                    {
                        echo "Aucun utilisateur trouvé";
                    }
                }

                else
                {
                    $reponse = SelectAllUser($bdd);
                }

                while($donnees = $reponse->fetch())
                {
                    echo "<p>".$donnees["nom"]." ".$donnees["prenom"]." - ".$donnees["identifiant"]." <a href='modifier_utilisateur-".$donnees["id_user"]."'>Modifier</a><hr></p>";
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