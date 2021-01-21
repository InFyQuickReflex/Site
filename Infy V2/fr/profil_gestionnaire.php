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
      <?php include("header_footer/header.php")?>

      <main>
          <?php
          if(isset($_SESSION["ID"]))
          {
            include('../php_fr/connexionbdd.php');
            include('../php_fr/fonctions/fonctions_permission.php');
            include('../php_fr/fonctions/fonctions_gerer_users.php');
            $donnees = PermissionGestion($bdd); ?>
            <br>
            <h2>Profil Gestionnaire</h2>

            <div class="profil">
                <img src="../img/pp.png">
                <p>
                    <?php
                        echo "<strong>Prénom</strong> : ".$donnees["prenom"]."<br>";
                        echo "<strong>Nom</strong> : ".$donnees["nom"]."<br>";
                        echo "<strong>Identifiant</strong> : ".$donnees["identifiant"]."<br>";
                        echo "<strong>Adresse email</strong> : ".$donnees["email"]."<br><br>";
                    $req->closeCursor();
                    ?>
                    <a href="../php_fr/deconnexion.php" class="button">Deconnexion</a>
                </p>
            </div>

            <br>
            <div class="create_user">
                <a href="creer_utilisateur.php">Créer un nouvel utilisateur</a>
            </div>

            <br>
            <form method="$_GET">
                <input type="search" placeholder="Chercher un utilisateur" name ="recherche" required>
                <input type="submit" value="Rechercher">
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
                    echo "<p>".$donnees["nom"]." ".$donnees["prenom"]." - ".$donnees["identifiant"]." <a href='modifier_utilisateur.php?ID=".$donnees["id_user"]."'>Modifier</a><hr></p>";
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