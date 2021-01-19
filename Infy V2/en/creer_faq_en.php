<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Add question</title>
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
        <h2>Add question</h2>
        <form method="POST" action="../php_en/modifier_faq_traitement_en.php">
          <label for="question">Question : </label>
          <input type="text" name="question" id="question" required><br><br>
          <label for="reponse"> Answer : </label><br>
          <textarea rows="10" cols="100" name="reponse" id="reponse" required></textarea><br><br>
          <input type="submit" name="action" class="modifier" value="Ajouter">
          <a href="gerer_faq.php" class="cancel">Cancel</a>
        </form>
      </main>

      <?php 
      }
      }
      include("header_footer/footer.php")?>
    </body>
</html>