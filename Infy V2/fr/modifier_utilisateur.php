<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Modifier un utilisateur</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header.php")?>

      <main>
        <?php
        if(isset($_SESSION["ID"]))
        {
          try
          {
              $bdd = new PDO("mysql:host=localhost;dbname=infy;charset=utf8", "root", "root");
          }

          catch (Exception $e)
          {
              die("Erreur : " . $e->getMessage());
          }

          $req = $bdd->prepare("SELECT permission FROM users WHERE ID = ?");
          $req->execute(array($_SESSION["ID"]));
          $donnees = $req->fetch();

          if($donnees["permission"] != "gestionnaire")
          {
              if($donnees["permission"] == "administrateur")
              {
                  header("Location: profil_administrateur.php");
              }

              else if($donnees["permission"] == "utilisateur")
              {
                  header("Location: profil_utilisateur.php");
              }
          }
          

          else
          {
              
              $req = $bdd->prepare("SELECT * FROM users WHERE ID = ?");
              $req->execute(array($_GET["ID"]));
              $donnees = $req->fetch();
              ?>
              <br>
              <h2>Modifier l'utilisateur</h2>
              <form method="POST" action="../php_fr/modifier.php">
                  <label for="ID">ID: </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>
                  <label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" value="<?php echo $donnees["prenom"] ?>"><br><br>
                  <label for="nom">Nom : </label><input type="text" name="nom" id="nom" value="<?php echo $donnees["nom"] ?>"><br><br>
                  <label for="identifiant">Identifiant : </label><input type="text" name="identifiant" id="identifiant" value="<?php echo $donnees["identifiant"] ?>"><br><br>
                  <label for="email">Adresse email : </label><input type="text" name="email" id="email" value="<?php echo $donnees["email"] ?>"><br><br>

                  <input type="submit" value="Valider">
                  <a href="profil_gestionnaire.php" class="cancel">Annuler</a>
                  <a href="../php_fr/supprimer.php?ID=<?php echo $_GET["ID"] ?>" class="delete">Supprimer</a>
              </form>

              <?php

              
          }
          $req->closeCursor();
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