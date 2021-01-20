<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Ajouter un paragraphe</title>
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
        <form method="POST" action="../php_fr/modifier_cgu_traitement.php">
          <label for="titre_fr">Titre (français) : </label>
          <input type="text" name="titre_fr" id="titre" required><br><br>
          <label for="paragraphe_fr"> Paragraphe (français) : </label><br>
          <textarea rows="10" cols="100" name="paragraphe_fr" id="paragraphe" required></textarea><br><br>
          <label for="titre_en">Titre (anglais) : </label>
          <input type="text" name="titre_en" id="titre" required><br><br>
          <label for="paragraphe_en"> Paragraphe (anglais): </label><br>
          <textarea rows="10" cols="100" name="paragraphe_en" id="paragraphe" required></textarea><br><br>
          <input type="submit" name="action" class = "modifier" value="Ajouter">
          <a href="gerer_cgu.php" class="cancel">Annuler</a>
        </form>
      </main>

      <?php 
      }
      }
      include("header_footer/footer.php")?>
    </body>
</html>