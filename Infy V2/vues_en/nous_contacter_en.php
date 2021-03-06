<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Contact us</title>
        <link rel="stylesheet" href="../css/header_footer.css">
		<link rel="stylesheet" href="../css/nous_contacter.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

      <main>
      <br><br>
      <?php
      if ((isset($_GET['envoi'])) and ($_GET['envoi']==true))
      {
          echo "<span id=SuccesMessage>Message sent successfully !</span><br>";
      }

      ?>
		<h2>Contact us</h2>
		<form method="POST" action="../controleur_en/envoi_mail_en.php" onsubmit="return validateFormEng()">
		<label for="nom">Your last name : </label><input type="text" name="nom" id="nom" required><br><br>
		<label for="prenom">Your first name : </label><input type="text" name="prenom" id="prenom" required><br><br>
        <label for="replyto">Your email : </label><input type="text" name="replyto" id="replyto" required><br><br>
		<label for='sujet'>Subject : </label><input type="text" name="sujet" id="sujet" required><br><br>
        <label for='message'>Your message : </label><br><br>
        <textarea id='message' name='message' rows=10 cols=100 required></textarea><br><br>
		<input type="submit" value="Confirm">
		</form>
      </main>
      <script src='../css/nous_contacter.js'></script>
      <?php include("header_footer/footer_en.php")?>
    </body>
</html>