<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titre</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/commencer_test.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header.php")
      include('../php_fr/fonctions/fonctions_permission.php');
      PermissionUser($bdd);?>

      <main>
      <br>
        <form method="post" action="timer.php" class="test_start">
            <p>
                <label for="num_boitier">Numéro boitier : </label><input type="text" name= "num_boitier" id="num_boitier" required><br><br>
                <input type="submit" value="Commencer le test" class="button">
            </p>
        </form>
      </main>

      <?php include("header_footer/footer.php")?>
    </body>
</html>