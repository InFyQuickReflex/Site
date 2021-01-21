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
      <?php include("header_footer/header_en.php")?>

      <main>
      <?php
      if(isset($_SESSION["ID"]))
      {
      include('../php_fr/connexionbdd.php');
      include('../php_fr/fonctions/fonctions_permission.php');
      PermissionAdmin($bdd);?>
        <br>
        <h2>Add question</h2>
        <form method="POST" action="../php_en/modifier_faq_traitement_en.php">
          <label for="question">Question : </label>
          <input type="text" name="question" id="question" required><br><br>
          <label for="reponse"> Answer : </label><br>
          <textarea rows="10" cols="100" name="reponse" id="reponse" required></textarea><br><br>
          <input type="submit" name="action" class="modifier" value="Add">
          <a href="gerer_faq.php" class="cancel">Cancel</a>
        </form>
      </main>

      <?php 
      }
      include("header_footer/footer_en.php")?>
    </body>
</html>
