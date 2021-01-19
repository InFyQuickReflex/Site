<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Add paragraph</title>
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
      include('../php_fr/connexionbdd.php');

      $req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
      $req->execute(array($_SESSION["ID"]));
      $donnees = $req->fetch();

      if($donnees["permission"] != "administrateur")
      {
        if($donnees["permission"] == "gestionnaire")
          {
            header("Location: profil_gestionnaire_en.php");
          }

         else if($donnees["permission"] == "utilisateur")
          {
            header("Location: profil_utilisateur_en.php");
          }
      }

      else 
      { ?>
        <br>
        <h2>Add paragraph</h2>
        <form method="POST" action="../php_en/modifier_cgu_traitement_en.php">
          <label for="titre">Title : </label>
          <input type="text" name="titre" id="titre" required><br><br>
          <label for="paragraphe"> Paragraph : </label><br>
          <textarea rows="10" cols="100" name="paragraphe" id="paragraphe" required></textarea><br><br>
          <input type="submit" name="action" class = "modifier" value="Ajouter">
          <a href="gerer_cgu.php" class="cancel">Cancel</a>
        </form>
      </main>

      <?php 
      }
      }
      include("header_footer/footer_en.php")?>
    </body>
</html>
