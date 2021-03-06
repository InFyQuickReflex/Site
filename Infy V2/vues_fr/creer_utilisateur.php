<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Créer un utilisateur</title>
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
          include('../controleur_fr/connexionbdd.php');
          include('../controleur_fr/fonctions/fonctions_permission.php');
          PermissionGestion($bdd);
              ?>
              <br>  
              <h2>Créer un utilisateur</h2>
              <form method="POST" action="../controleur_fr/modifier_user_traitement.php">
                  <label for="prenom">Prénom : </label><input type="text" name="prenom" id="prenom" required><br><br>
                  <label for="nom">Nom : </label><input type="text" name="nom" id="nom" required><br><br>
                  <label for="identifiant">Identifiant : </label><input type="text" name="identifiant" id="identifiant" required><br><br>
                  <label for="email">Adresse email : </label><input type="text" name="email" id="email"required><br><br>
                  <label for="mot_de_passe">Mot de passe : </label><input type="password" name="mot_de_passe" id="mot_de_passe" required><br><br>
                  <label for="date_de_naissance"> Date de naissance : </label><input type="date" name="date_de_naissance" id="date_de_naissance" required><br><br>
                  <label for="telephone">Telephone : </label><input type="tel" name="telephone" id="telephone" required><br><br>

                  <input type="submit" name="action" class="modifier"value="Valider">
                  <a href="profil_gestionnaire.php" class="cancel">Annuler</a>
              </form>

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