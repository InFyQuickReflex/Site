<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Nous contacter</title>
        <link rel="stylesheet" href="../css/header_footer.css">
		<link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header.php")?>

      <main>
      <br><br>
      <?php
      if ((isset($_GET['envoi'])) and ($_GET['envoi']==true))
      {
          echo "<strong style='color:green'>Message envoyé avec succès !</strong><br><br>";
      }

      ?>
		<h2>Nous contacter</h2>
		<form method="POST" action="../php_fr/envoi_mail.php">
		<label for="nom">Votre nom : </label><input type="text" name="nom" id="nom" required><br><br>
		<label for="prenom">Votre prenom : </label><input type="text" name="prenom" id="prenom" required><br><br>
        <label for="replyto">Votre adresse mail : </label><input type="mail" name="replyto" id="replyto" required><br><br>
		<label for='sujet'>Sujet du message : </label><input type="text" name="sujet" id="sujet" required><br><br>
        <label for='message'>Votre message : </label><br><br>
        <textarea id='message' name='message' rows=10 cols=100 required></textarea><br><br>
		<input type="submit" value="Valider">
		</form>
      </main>

      <?php include("header_footer/footer.php")?>
    </body>
</html>