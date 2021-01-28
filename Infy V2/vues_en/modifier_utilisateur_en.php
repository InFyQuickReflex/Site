<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Edit a User</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src = "../css/popup.js"></script>
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
          PermissionGestion($bdd);
          $donnees = SelectUser($bdd, $_GET["ID"]);
        ?>
              <br>
              <h2>Edit User</h2>
              <form method="POST" action="../controleur_fr/modifier_user_traitement.php">
                  <label for="ID">ID: </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>

                  <label for="prenom">Name : </label><input type="text" name="prenom" id="prenom" value="<?php echo $donnees["prenom"] ?>"><br><br>

                  <label for="nom">Last Name : </label><input type="text" name="nom" id="nom" value="<?php echo $donnees["nom"] ?>"><br><br>

                  <label for="identifiant">Username : </label><input type="text" name="identifiant" id="identifiant" value="<?php echo $donnees["identifiant"] ?>"><br><br>

                  <label for="email">Email : </label><input type="text" name="email" id="email" value="<?php echo $donnees["email"] ?>"><br><br>

                  <label for="date_de_naissance"> Date de naissance : </label><input type="date" name="date_de_naissance" id="date_de_naissance" value="<?php echo $donnees["date_de_naissance"] ?>"><br><br>

                  <label for="telephone">Phone Number : </label><input type="tel" name="telephone" id="telephone" value="<?php echo $donnees["telephone"] ?>"><br><br>


                  <input type="submit" name="action" class="modifier" value="Edit" onclick= 'ConfirmationEng()';>
                  <a href="profil_gestionnaire_en.php" class="cancel">Cancel</a>
                  <input type="submit" name = "action" value="Delete" class="delete" onclick= 'ConfirmationEng()';>
              </form>

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