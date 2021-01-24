<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>New test</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/commencer_test.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>

      <main>
      <br>
        <form method="post" action="timer.php" class="test_start">
            <p>
                <label for="num_boitier">Case number : </label><input type="text" name= "num_boitier" id="num_boitier" required><br><br>
                <input type="submit" value="Start the test" class="button">
            </p>
        </form>
      </main>

      <?php include("header_footer/footer_en.php")?>
    </body>
</html>