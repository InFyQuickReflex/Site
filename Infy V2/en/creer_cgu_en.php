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
      include('../php_fr/fonctions/fonctions_permission.php');
      PermissionAdmin($bdd); ?>
        <br>
        <h2>Add paragraph</h2>
        <form method="POST" action="../php_fr/modifier_cgu_traitement.php">
          <label for="titre_fr">Title (french) : </label>
          <input type="text" name="titre_fr" id="titre" required><br><br>
          <label for="paragraphe_fr"> Paragraph (french) : </label><br>
          <textarea rows="10" cols="100" name="paragraphe_fr" id="paragraphe" required></textarea><br><br>
          <label for="titre_en">Title (english) : </label>
          <input type="text" name="titre_en" id="titre" required><br><br>
          <label for="paragraphe"> Paragraph (english): </label><br>
          <textarea rows="10" cols="100" name="paragraphe_en" id="paragraphe" required></textarea><br><br>
          <input type="submit" name="action" class = "modifier" value="Add">
          <a href="gerer_cgu_en.php" class="cancel">Cancel</a>
        </form>
      </main>

      <?php 
      }
      include("header_footer/footer_en.php")?>
    </body>
</html>
