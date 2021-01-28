<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Create new user</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/modifier_creer.css">
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
              <h2>Create new user</h2>
              <form method="POST" action="../php_en/modifier_user_traitement.php">
                  <label for="prenom">First Name : </label><input type="text" name="prenom" id="prenom" required><br><br>
                  <label for="nom">Last Name : </label><input type="text" name="nom" id="nom" required><br><br>
                  <label for="identifiant">Username : </label><input type="text" name="identifiant" id="identifiant" required><br><br>
                  <label for="email">E-mail adress : </label><input type="text" name="email" id="email"required><br><br>
                  <label for="mot_de_passe">Password : </label><input type="password" name="mot_de_passe" id="mot_de_passe" required><br><br>
                  <label for="date_de_naissance"> Date of birth : </label><input type="date" name="date_de_naissance" id="date_de_naissance" required><br><br>
                  <label for="telephone">Phone : </label><input type="tel" name="telephone" id="telephone" required><br><br>

                  <input type="submit" name="action" class="modifier"value="Add">
                  <a href="profil_gestionnaire_en.php" class="cancel">Cancel</a>
              </form>

              <?php

              
          }
          $req->closeCursor();
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
