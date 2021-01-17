<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Titre</title>
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
      include('../php_fr/connexionbdd.php');

      $req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
      $req->execute(array($_SESSION["ID"]));
      $donnees = $req->fetch();

      if($donnees["permission"] != "administrateur")
      {
        if($donnees["permission"] == "gestionnaire")
          {
            header("Location: profil_gestionnaire.php");
          }

         else if($donnees["permission"] == "utilisateur")
          {
            header("Location: profil_utilisateur.php");
          }
      }

      else
      { ?>
        <br>
        <h2>Ajouter un paragraphe</h2>
        <form method="POST" action="../php_fr/creer_cgu_traitement.php">
          <label for="titre">Titre : </label>
          <input type="text" name="titre" id="titre" required><br><br>
          <label for="paragraphe"> Paragraphe : </label><br>
          <textarea rows="10" cols="100" name="paragraphe" id="paragraphe" required></textarea><br><br>
          <input type="submit" value="Valider">
          <a href="profil_administrateur.php" class="cancel">Annuler</a>
        </form>
      </main>

      <?php 
      }
      }
      include("header_footer/footer.php")?>
    </body>
</html>